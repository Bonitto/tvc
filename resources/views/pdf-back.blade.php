<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style class="text/css">
		@font-face {
			font-family: 'Arial';
			font-style: normal;
			font-weight: normal;
			src: url({{ url('css/fonts/ARIALN.TTF') }}) format('truetype');
		}
		
		@font-face {
			font-family: 'Archer';
			font-style: normal;
			font-weight: normal;
			src: url({{ url('css/fonts/Archer-Bold-Pro.ttf') }}) format('truetype');
		}
		
		@font-face {
			font-family: 'Minion';
			font-style: normal;
			font-weight: normal;
			src: url({{ url('css/fonts/MinionPro-Regular.otf') }}) format('opentype');
		}
	
		.archer {
			font-family: 'Archer';
		}
		
		html, body {
			text-align: center;
			font-family: 'Arial';
			margin: 0px;
			padding: 0px;
		}
		
		.label {
			display: inline-block;
			margin: 0px;
			padding: 0px;
			position: relative;
		}
		
		.bg-tvc,
		.bg-tvc-metal {
			position: absolute;
			z-index: -1;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			width: 240px;
		}
		
		.label-top {
			text-align: center;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			height: 40px;
		}
		
		.label-bottom {
			position: absolute;
			top: 70px;
			left: 0;
			right: 0;
			bottom: 0;
			overflow: hidden;
			z-index: 10;
		}
		
		.page-break {
			page-break-after: always;
		}
		
		p {
			padding-top: 0px;
			padding-bottom: 0px;
			margin-top: 0px;
			margin-bottom: 0px;
		}
		
		.left {
			text-align: left;
		}
		
		.font-5 {
			font-size: 5px;
		}
		
		.font-7 {
			font-size: 7px;
		}
		
		.font-9 {
			font-size: 12px;
		}
		
		.font-12 {
			font-size: 18px;
		}
		
		.pad-left {
			padding-left: 10px;
			padding-right: 10px;
		}
		
		.pull-right {
			position: absolute;
			bottom: 4px;
			right: 10px;
		}
		
		.item-title {
			padding-top: 0px;
			margin-top: 0px;
			position: relative;
			top: 2px;
			line-height: 12px;
		}
		
		.item-desc {
			line-height: 6px;
			position: relative;
			top: 5px;
			width: 100%;
		}
		
		.item-warning {
			position: absolute;
			left: 0;
			right: 0;
			bottom: 4px;
		}
		
		.label-left {
			position: absolute;
			left: 0;
			top: 0;
			bottom: 0;
			width: 35%;
			background: #71877f;
			color: #ffffff;
			padding-top: 6px;
			z-index: 1;
		}
		
		#chalkline {
			position: absolute;
			top: 0;
			left: 67px;
			z-index: 10;
		}

		.label-right {
			position: absolute;
			right: 0;
			top: 0;
			bottom: 0;
			width: 35%;
			background: #71877f;
			color: #ffffff;
			padding-top: 12px;
		}
		
		.keystone .label-middle {
			position: absolute;
			left: 35%;
			top: 0;
			bottom: 0;
			width: 65%;
			padding-top: 10px;
			background: #62b4ef;
			text-align: center;
			color: black;
			z-index: 1;
		}
		
		.yellow {
			color: #AFB632;
		}
		
		.italic {
			font-style: italic;
		}
		
		
		.new-label .label-top {
			
		}
	</style>
</head>
<body>
	<?php
		$orders = $_GET['orders'];
		$ordersArray = explode(',', $orders);
		$j = 0;
		
		foreach ($ordersArray as $order_id) {
			$order = App\Order::where('order_id', '=', $order_id)->first();
			$order_items = App\OrderLineItem::where('order_id', $order->id)->get();
			$i = 0;
			
			$order->print_status = true;
			$order->save();
		?>
			@foreach ($order_items as $item)
				<?php for ($k = 1; $k <= $item->quantity; $k++) { ?>
				<?php $collectionCheck = App\OrderLineItemCollection::where('order_id', '=', $order->order_id)->where('product_id', '=', $item->product_id)->first(); ?>
				@if ($j >= 0 && $i != 0)
					<div class="page-break"></div>
				@endif
				@if ($collectionCheck && $collectionCheck->collection_id == '404763469')
					<div class="label keystone">
						<div class="label-left">
							<p class="left font-5 pad-left item-desc"><span class="yellow minion">California Pro 65 Warning:</span> This product may contain nicotine, a chemical known to the state of California to cause birth defects or other reproductive harm. May contain nicotine propolyne glycol, vegetable glycerin, natural and artificial flavors</p>
						</div>
						<img src="{{ url('img/chalkline.png') }}" id="chalkline">
						<div class="label-middle">
							<img src="{{ url('img/keystone.png') }}" style="height:30px; margin-top: 5px;">
							<br/>
							<span class="font-12 archer">{{ $item->name }}</span>
							<br/>
							<p class="left font-7 pad-left item-desc">{{ $item->description }}</p>
							<p class="pull-right font-7">Mixed {{ date('m/d/y') }}</p>
						</div>
					</div>
				@else
					@if (1 == 1)
						@if (1 == 1)
						<div class="new-label tvc-metal">
							<img src="{{ url('img/bg-metal.jpg') }}" class="bg-tvc-metal">
							<div class="label-top">
								<div class="label-left center">
									<p>Product not to be sold to people under the age of 18. Keep out of reach of children and animals.</p>
									<p>WARNING<br/>This product contains nicotine. Nicotine is an addictive chemical.</p>
								</div><!-- ./label-left -->
								<div class="label-middle">
									<img src="{{ url('img/logo-black.png') }}" style="height:45px; margin-top: 7px;">
								</div><!-- ./label-middle -->
								<div class="label-right">
									
								</div><!-- ./label-right -->
							</div><!-- ./label-top -->
							<div class="label-bottom">
								
							</div><!-- ./label-bottom -->
						</div><!-- ./tvc-metal -->
						@else
						<div class="label tvc">
							<img src="{{ url('img/bg-orig.jpg') }}" class="bg-tvc">
							<div class="label-top">
								<img src="{{ url('img/vc_logo_knockout.png') }}" style="height:45px; margin-top: 7px;">
							</div>
							<div class="label-bottom">
								<p class="font-12 item-title italic">{{ $item->name }}<br/><span class="font-9">{{ $item->description }}</span></p>
								<p class="left font-7 pad-left item-desc">WARNING: This product contains nicotine. Nicotine is an addictive chemical.</p>
								<p class="left font-7 pad-left item-warning">Keep away from children and pets!</p>
								<p class="pull-right font-7">Mixed {{ date('m/d/y') }}</p>
							</div>
						</div>
						@endif
					@else
						<div class="label">
							<div class="label-top">
								<img src="{{ url('img/vc_logo_knockout.png') }}" style="height:30px; margin-top: 5px;">
							</div>
							<div class="label-bottom">
								<p class="font-12 item-title">{{ $item->name }}<br/><span class="font-9">{{ $item->description }}</span></p>
								<p class="left font-7 pad-left item-desc">WARNING: This product contains nicotine. <br/>Nicotine is an addictive chemical.</p>
								<p class="left font-7 pad-left item-warning">Keep away from children and pets!</p>
								<p class="pull-right font-7">Mixed {{ date('m/d/y') }}</p>
							</div>
						</div>
					@endif
				@endif
				<?php } ?>
				<?php $i++; ?>
			@endforeach
	<?php
		$j++;
		} // end foreach
		?>
</body>
</html>