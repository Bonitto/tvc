@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>

				<div class="panel-body">
					<a href="/shopify">Load Orders from Shopify</a><br/>
					<a href="/print" id="printOrders">Print Selected Orders</a>
				</div><!-- ./paniel-body -->
			</div><!-- ./panel -->
			
			<div class="panel panel-default">
				<div class="panel-heading">Orders</div>

				<div class="panel-body">
					<table class="table table-hover">
						<thead>
							<td></td>
							<td>Order ID</td>
							<td>Print Status</td>
							<td>Line Items</td>
						</thead>
						@foreach ($orders as $order)
							<tr>
								<td><input type="checkbox" name="order_{{ $order->id }}" class="print-order" data-id="{{ $order->order_id }}"></td>
								<td>{{ $order->order_id }}</td>
								<td>
									@if ($order->print_status == 0)
										<span class="glyphicon glyphicon-remove red" aria-hidden="true"></span>
									@else
										<span class="glyphicon glyphicon-ok green" aria-hidden="true"></span>
									@endif
								</td>
								<td>
									<?php
										$items = App\OrderLineItem::where('order_id', '=', $order->id)->get();
										$i = 1;
									?>
									<table class="table table-condensed">
										<thead>
											<td></td>
											<td>#</td>
											<td>Name</td>
											<td>Description</td>
											<td></td>
										</thead>
										@foreach ($items as $item)
											<tr>
												<td><input type="checkbox" name="order_item[{{ $order->id }}][{{ $i }}]" class="print-order-item order-target-{{ $order->order_id }}" data-id="{{ $item->id }}"></td>
												<td>{{ $item->quantity }}</td>
												<td>{{ $item->name }} <span class="glyphicon glyphicon-edit pull-right editLabelName" data-id="{{ $item->id }}" data-input="{{ $item->name }}"></span></td>
												<td>{{ $item->description }} <span class="glyphicon glyphicon-edit pull-right editLabelDesc" data-id="{{ $item->id }}" data-input="{{ $item->description }}"></span></td>
												<?php $collectionCheck = App\OrderLineItemCollection::where('order_id', '=', $order->order_id)->where('product_id', '=', $item->product_id)->first(); ?>
												<td>
													@if ($collectionCheck && $collectionCheck->collection_id == '404763469')
														<span class="glyphicon glyphicon-info-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="This product is in the Keystone Vapor collection -- It will print a Keystone Vapor label"></span>
													@endif
												</td>
											</tr>
											<?php $i++; ?>
										@endforeach
									</table>
								</td>
							</tr>
						@endforeach
					</table>
					{{ $orders->links() }}
				</div><!-- ./paniel-body -->
			</div><!-- ./panel -->
		</div><!-- ./col-md-8 -->
		
	</div><!-- ./row -->
</div><!-- ./container -->
@endsection
