<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::post('editLabelName', function() {
	$item = App\OrderLineItem::where('id', '=', $_POST['id'])->first();
	
	$item->name = $_POST['input'];
	
	$item->save();
	
	return 'success';
});

Route::post('editLabelDesc', function() {
	$item = App\OrderLineItem::where('id', '=', $_POST['id'])->first();
	
	$item->description = $_POST['input'];
	
	$item->save();
	
	return 'success';
});

Route::get('print', function () {	
	$pdf = App::make('dompdf.wrapper');
	$pdf->loadView('pdf')->setPaper(array(0, 0, 180, 90));
	return $pdf->stream();
});

Route::get('shopify-test', function () {
	$sh = App::make('ShopifyAPI');
	
	$sh->setup(['API_KEY' => 'b90e4ea8ec55692a23dac0cf91ade93e', 'API_SECRET' => 'c3d9a89658b00872b9b1b8394ab713ed', 'SHOP_DOMAIN' => 'vapor-chef.myshopify.com', 'ACCESS_TOKEN' => '86733ef635de55c0ee44273095fc7b2c']);
	
	$latest = App\Order::orderBy('order_id', 'DESC')->first();
	
	try
	{
		$call = $sh->call(['URL' => 'collects.json', 'METHOD' => 'GET', 'DATA' => ['product_id' => '8754942221']]);
	}
	catch (Exception $e)
	{
		$call = $e->getMessage();
	}
	
	echo '<pre>';
	var_dump($call);
	echo '</pre>';
});

Route::get('shopify', function () {
	$sh = App::make('ShopifyAPI');
	
	$sh->setup(['API_KEY' => 'b90e4ea8ec55692a23dac0cf91ade93e', 'API_SECRET' => 'c3d9a89658b00872b9b1b8394ab713ed', 'SHOP_DOMAIN' => 'vapor-chef.myshopify.com', 'ACCESS_TOKEN' => '86733ef635de55c0ee44273095fc7b2c']);
	
	$latest = App\Order::orderBy('order_id', 'DESC')->first();
	
	try
	{
		if (!empty($latest)) {
			$call = $sh->call(['URL' => 'orders.json', 'METHOD' => 'GET', 'DATA' => ['since_id' => $latest->reference_id, 'published_status' => 'any']]);
		} else {
			$call = $sh->call(['URL' => 'orders.json', 'METHOD' => 'GET', 'DATA' => ['published_status' => 'any']]);
		}
	}
	catch (Exception $e)
	{
		$call = $e->getMessage();
	}
	
/*
	echo '<pre>';
	var_dump($call);
	echo '</pre>';
*/
	
	foreach ($call->orders as $order) {
		$check = App\Order::where('order_id', '=', str_replace('#', '', $order->name))->first();
		
		if ($check) continue;
		
		$new_order = new App\Order;
		
		$new_order->order_id = str_replace('#', '', $order->name);
		$new_order->reference_id = $order->id;
		$new_order->fulfillment_status = $order->fulfillment_status;
		$new_order->print_status = false;
		$new_order->dump = json_encode($order);
		
		$new_order->save();
		
		foreach ($order->line_items as $line_item) {
			$desc1 = $line_item->variant_title;
			$desc2 = getProperty('Nicotine Level (MG/ML)', $line_item->properties);
			$desc3 = getProperty('PG/VG Ratio', $line_item->properties);
			
			//echo '<b>'.$desc1.'</b>:'.$desc2 . ' ' . $desc3 . '<br>';
			
			if (empty($desc2)) {
				$desc2 = '';
				$desc3 = '';
			} else {
				$desc1 = '';
				$desc2 .= '-';
			}
			
			$new_line_item = new App\OrderLineItem;
			
			$new_line_item->order_id = $new_order->id;
			$new_line_item->product_id = $line_item->id;
			$new_line_item->name = $line_item->title;
			$new_line_item->description = $desc1 . $desc2 . $desc3;
			$new_line_item->quantity = $line_item->quantity;
			$new_line_item->print_status = false;
			
			if ($new_line_item->name == 'Bonus Bottle') {
				$new_line_item->name = $new_line_item->description;
				$new_line_item->description = 'Bonus Bottle';
			}
			
			$new_line_item->save();
			
			// get the collections
			try
			{
				$callCollections = $sh->call(['URL' => 'collects.json', 'METHOD' => 'GET', 'DATA' => ['product_id' => $line_item->product_id]]);
			}
			catch (Exception $e)
			{
				$callCollections = $e->getMessage();
			}
			
/*
			echo '<pre>';
			var_dump($callCollections);
			echo '</pre>';
*/
			
			// save the collections
			foreach ($callCollections->collects as $collection) {
				$row = new App\OrderLineItemCollection;
				
				$row->order_id = $new_order->order_id;
				$row->order_item_id = $new_line_item->id;
				$row->collection_id = $collection->collection_id;
				$row->product_id = $line_item->id;
				
				$row->save();
			}
		}
	}
	
	return redirect('/');
});