$(function(){
	var r = Raphael('map', 700, 850),
		attributes = {
            fill: '#e6e7e8',
            stroke: '#B5B5B5',
            'stroke-width': 1,
            'stroke-linejoin': 'round'
        },
		arr = new Array();
	
	for (var country in paths) {
		
		var obj = r.path(paths[country].path);
		
		
		obj.attr(attributes);
		
		
		arr[obj.id] = country;		 
		
		obj.hover(function(){
		  this.animate({
			fill: '#2495dd',
			stroke: '#ffffff'
		  }, 300);
		}, function(){
		  this.animate({
			fill: attributes.fill,
			stroke: attributes.stroke
		  }, 300);
		});

		
	}
		
		
			
});

