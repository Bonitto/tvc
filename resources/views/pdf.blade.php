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
		
		@font-face {
			font-family: 'Amiri';
			font-style: normal;
			font-weight: normal;
			src: url({{ url('css/fonts/Amiri-Regular.TTF') }}) format('truetype');
		}
		
		@font-face {
			font-family: 'Amiri-Bold';
			font-style: normal;
			font-weight: normal;
			src: url({{ url('css/fonts/Amiri-Bold.TTF') }}) format('truetype');
		}
		
		@font-face {
			font-family: 'Amiri-Italic';
			font-style: normal;
			font-weight: normal;
			src: url({{ url('css/fonts/Amiri-Slanted.TTF') }}) format('truetype');
		}
		
		@font-face {
			font-family: 'Brandon';
			font-style: normal;
			font-weight: normal;
			src: url({{ url('css/fonts/BrandonGrotesque-Black.TTF') }}) format('truetype');
		}
	
		.archer {
			font-family: 'Archer';
		}
		
		.amiri {
			font-family: 'Amiri';
		}
		
		.amiri.bold {
			font-family: 'Amiri-Bold';
		}
		
		.amiri.italic {
			font-family: 'Amiri-Italic';
		}
		
		.brandon {
			font-family: 'Brandon';
		}
		
		html, body {
			text-align: center;
			font-family: 'Amiri';
			margin: 0px;
			padding: 0px;
		}
		
		.label {
			display: inline-block;
			margin: 0px;
			padding: 0px;
			position: relative;
		}
		
		.white {
			color: #ffffff;
		}
		
		.bg-tvc-metal,
		.bg-ks {
			position: absolute;
			z-index: -1;
			top: 0;
			left: -6px;
			right: 0;
			bottom: 0;
			width: 246px;
		}
		
		.label-top {
			text-align: center;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			height: 240px;
		}
		
		.label-bottom {
			position: absolute;
			top: 90px;
			left: 0;
			right: 0;
			bottom: 0;
			overflow: hidden;
			z-index: 10;
			padding-left: 5px;
			padding-right: 5px;
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
			width: 40px;
			color: #000000;
			padding-top: 7px;
			z-index: 1;
			padding-left: 8px;
			padding-right: 8px;
		}
		
		.label-left p {
			font-size: 5px;
			line-height: 3.5px;
			margin-bottom: 6px;
		}
		
		.ks .label-left p {
			margin-bottom: 5px;
		}
		
		.label-middle {
			position: absolute;
			left: 60px;
			right: 65px;
		}
		
		.tvc-medal .label-middle {
			left: 40px;
			right: 45px;
		}

		.label-right {
			position: absolute;
			right: 0;
			top: 0;
			bottom: 0;
			width: 40px;
			color: #000000;
			padding-top: 7px;
			padding-right: 8px;
		}
		
		.ks .label-right {
			width: 50px;
		}
		
		.label-right p {
			font-size: 5px;
			line-height: 3.5px;
			margin-bottom: 5px;
		}
		
		.yellow {
			color: #AFB632;
		}
		
		.italic {
			font-style: italic;
		}
		
		.label-middle hr {
			display: inline-block;
			width: 20%;
			border-top: .05px solid #000000;
			margin-top: 5px;
			margin-bottom: 5px;
		}
		
		.label-right hr {
			display: inline-block;
			width: 40%;
			border-top: .05px solid #000000;
			margin-top: 3px;
			margin-bottom: 3px;
		}
		
		.product-ingredients {
			font-size: 5px;
			line-height: 3.5px;
		}
		
		.website {
			background: #000000;
			color: #ffffff;
			font-family: 'Brandon';
			font-size: 5px;
			line-height: 4px;
			padding-top: 1px;
			padding-bottom: 1px;
		}
		
		.ks .website {
			background: none;
			color: #19499f;
			position: absolute;
			bottom: 0px;
			left: 0;
			right: 0;
		}
		
		.cali-warning {
			font-size: 5px;
			line-height: 3.5px;
			margin-top: 3px;
		}
		
		.item-title {
			padding-left: 10px;
			padding-right: 10px;
			line-height: 15px;
			margin-top: 2px;
		}
		
		.tvc-metal .item-title {
			white-space: nowrap;
		}
		
		.tvc-metal .label-middle .small {
			font-size: 12px;
			white-space: nowrap;
			margin-top: 3px;
		}
		
		.top-caret {
			position: absolute;
			top: 0;
			left: 25px;
			width: 5px;
			height: 4px;
		}
	</style>
</head>
<body>
	<?php
		$orders = $_GET['orders'];
		$ordersArray = explode(',', $orders);
		$items = $_GET['items'];
		$itemsArray = explode(',', $items);
		$j = 0;
		
		foreach ($ordersArray as $order_id) {
			$order = App\Order::where('order_id', '=', $order_id)->first();
			$order_items = App\OrderLineItem::where('order_id', $order->id)->get();
			$i = 0;
			$skipPage = false;
			
			$order->print_status = true;
			$order->save();
		?>
			@foreach ($order_items as $item)
				<?php for ($k = 1; $k <= $item->quantity; $k++) { ?>
				<?php $collectionCheck = App\OrderLineItemCollection::where('order_id', '=', $order->order_id)->where('product_id', '=', $item->product_id)->first(); ?>
				<?php
					if (!in_array($item->id, $itemsArray)) {
						// check if it was the first one
						if ($j == 0 && $i == 0) {
							$skipPage = true;
						} else {
							$skipPage = false;
						}
						continue;
					}
				?>
				@if ($j > 0 || $i > 0)
					<?php
						if ($skipPage == true) {
							$skipPage = false;
						} else {
					?>
					<div class="page-break"></div>
					<?php } ?>
				@endif
				@if ($collectionCheck && $collectionCheck->collection_id == '404763469')
					<div class="new-label ks">
						<img src="{{ url('img/vc_keystone_bg.jpg') }}" class="bg-ks">
						<img src="{{ url('img/arrow_ks_large.png') }}" class="top-caret">
						<div class="label-top">
							<div class="label-left center">
								<p class="amiri">Product not to be sold to people under the age of 18. Keep out of reach of children and animals.</p>
								<p class="amiri"><span class="brandon">WARNING</span><br/>This product contains nicotine. Nicotine is an addictive chemical.</p>
								<p class="amiri"><span class="brandon">INGREDIENTS:</span><br/>propylene glycol, vegetable glycerin, flavorings, nicotine</p>
							</div><!-- ./label-left -->
							<div class="label-middle">
								<img src="{{ url('img/keystone.png') }}" style="height:50px; margin-top: 6px; margin-bottom: 3px;">
								<p class="amiri italic white item-title <?php if (strlen($item->name) > 20) echo 'small'; ?>">{{ $item->name }}</p>
							</div><!-- ./label-middle -->
							<div class="label-right">
								<?php
									$x = explode('-', $item->description);
									if (count($x) == 1) {
										$x = explode(' / ', $item->description);
										
										if (count($x) == 3) {
											$x[1] = $x[1] . ' / ' . $x[2];
										}
									}
								?>
								<p class="amiri"><span class="brandon">NICOTINE<br/>CONTENT:</span><br/>{{ $x[0] }}</p><hr/><p class="amiri">{{ @$x[1] }}</p>
								<hr/>
								<p class="amiri"><span class="brandon">MIXED ON:</span><br/>{{ date('m/d/y') }}</p>
								<p class="cali-warning"><span class="brandon">CALIFORNIA<br/>PROPOSITION 65:</span> This product contains nicotine, a chemical known to the state of California to cause birth defects or other reproductive harm.</p>
							</div><!-- ./label-right -->
						</div><!-- ./label-top -->
						<div class="label-bottom center">
							<p class="website">WWW.KEYSTONEVAPOR.COM</p>
						</div><!-- ./label-bottom -->
					</div><!-- ./tvc-metal -->
				@else
					<div class="new-label tvc-metal">
						<img src="{{ url('img/vc_bg.jpg') }}" class="bg-tvc-metal">
						<img src="{{ url('img/arrow_large.png') }}" class="top-caret">
						<div class="label-top">
							<div class="label-left center">
								<p class="">Product not to be sold to people under the age of 18. Keep out of reach of children and animals.</p>
								<p class=""><span class="brandon">WARNING:</span><br/>This product contains nicotine. Nicotine is an addictive chemical.</p>
							</div><!-- ./label-left -->
							<div class="label-middle">
								<img src="{{ url('img/logo-black.png') }}" style="height:40px; margin-top: 4px;">
								<p class="amiri italic item-title <?php if (strlen($item->name) > 20) echo 'small'; ?>">{{ $item->name }}</p>
								<hr/>
								<p class="brandon product-ingredients">INGREDIENTS: PROPYLENE GLYCOL,<br/>VEGETABLE GLYCERIN, FLAVORINGS, NICOTINE</p>
							</div><!-- ./label-middle -->
							<div class="label-right">
								<?php
									$x = explode('-', $item->description);
									
									if (count($x) == 1) {
										$x = explode(' / ', $item->description);
										
										if (count($x) == 3) {
											$x[1] = $x[1] . ' / ' . $x[2];
										}
									}
								?>
								<p class="amiri"><span class="brandon">NICOTINE<br/>CONTENT:</span><br/>{{ $x[0] }}</p><?php if (!empty($x[1])) { echo '<hr/>'; } ?><p class="amiri">{{ @$x[1] }}</p>
								<hr/>
								<p class="amiri bold"><span class="brandon">MIXED ON:</span><br/>{{ date('m/d/y') }}</p>
							</div><!-- ./label-right -->
						</div><!-- ./label-top -->
						<div class="label-bottom center">
							<p class="website">WWW.THEVAPORCHEF.COM</p>
							<p class="cali-warning">California Proposition 65: This product contains nicotine, a chemical known<br/> to the state of California to cause birth defects or other reproductive harm.</p>
						</div><!-- ./label-bottom -->
					</div><!-- ./tvc-metal -->
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