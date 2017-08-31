var orders = []
	, order_items = [];

$(document).ready(function() {
	// check all orders items
	$('.print-order').on('change', function() {
		if (this.checked == true) {
			$('.order-target-' + $(this).attr('data-id')).each(function() {
				$(this).prop('checked', true);
			});
		} else {
			$('.order-target-' + $(this).attr('data-id')).each(function() {
				$(this).prop('checked', false);
			});
		}
	});
	
	// handle printing checked orders
	$('#printOrders').on('click', function(e) {
		e.preventDefault();
		
		orders = [];
		order_items = [];
		
		// get orders
		$('.print-order:checked').each(function() {
			orders.push($(this).attr('data-id'));
		});
		
		$('.print-order-item:checked').each(function() {
			order_items.push($(this).attr('data-id'));
		});
		
		if (orders.length > 0) {
			window.open('/print?orders=' + orders + '&items=' + order_items, '_blank');
		} else {
			alert('You must select orders below first.');
		}
	});
	
	// tooltips
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	
	// handle label edits
	$('.editLabelName').on('click', function() {
		var input = prompt('Enter what you would like this line item\'s label to say', $(this).attr('data-input'));
		
		if (input.length > 0) {
			$.post('editLabelName', {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), id: $(this).attr('data-id'), input: input}, function(data) {
				console.log(data);
				location.reload();
			});
		}
	});
	
	$('.editLabelDesc').on('click', function() {
		var input = prompt('Enter what you would like this line item\'s label to say', $(this).attr('data-input'));
		
		if (input.length > 0) {
			$.post('editLabelDesc', {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), id: $(this).attr('data-id'), input: input}, function(data) {
				console.log(data);
				location.reload();
			});
		}
	});
});