$(function() {
	$('#price').change(function () {
	var val = $(this).val();
	$('#slider_price2').slider("values",0,val);
	});

	$('#year').change(function () {
	var val = $(this).val();
	$('#slider_price').slider("values",0,val);
	});	
	
	$('#price2').change( function() {
		var val2 = $(this).val();
		$('#slider_price2').slider("values",1,val2);
	});
	
	$('#year2').change( function() {
		var val2 = $(this).val();
		$('#slider_price').slider("values",1,val2);
	});

	$( "#slider_price" ).slider({
		range: true,
		//orientation: "vertical",
		min: 18,
		step:1,
		max: 60,
		values: [ 18, 60 ],
		slide: function( event, ui ) {
			//$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			$('#year').val(ui.values[0]);
			$('#year2').val(ui.values[1]);
		}
	});
	
	$( "#slider_price2" ).slider({
		range: true,
		//orientation: "vertical",
		min: 0,
		step:100,
		max: 100000,
		values: [ 0, 100000 ],
		slide: function( event, ui ) {
			//$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			$('#price').val(ui.values[0]);
			$('#price2').val(ui.values[1]);
		}
	});
	//$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		//" - $" + $( "#slider-range" ).slider( "values", 1 ) );
		$('#price').val($('#slider_price2').slider("values",0));
		$('#price2').val($('#slider_price2').slider("values",1));

		$('#year').val($('#slider_price').slider("values",0));
		$('#year2').val($('#slider_price').slider("values",1));
});