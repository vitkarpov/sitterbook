$(function(){
	var r = Raphael('map4', 700, 850),
		attributes = {
            fill: '#e6e7e8',
            stroke: '#B5B5B5',
            'stroke-width': 1,
            'stroke-linejoin': 'round'
        },
		arr = new Array();
	
	for (var country in paths) {
		
		var obj4 = r.path(paths[country].path);
		
		
		obj4.attr(attributes);
		
		
		arr[obj4.id] = country;		 
		
		obj4.hover(function(){
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
		
		
		obj4.click(function(){
		  document.location.hash = arr[this.id];
		  // меняем адрес документа (после #)
		  var point = this.getBBox(0);
		  // возвращает размер элемента
		  $('#map4').next('.point').remove();
		  $('#map4').after($('<div />').addClass('point'));
		  // удаляем существующий div с классом point и создаём ещё один
		  $('.point')
		  .html('<div class="raion"><p class="mm"><a href="#">Выберите район<br />в данном округе</a></p></div>')
		  .css({
		  left: point.x+(point.width)+100,
		  top: point.y+(point.height/2)+30
		  })
		  .fadeIn();
		  // добавляем контент (название страны, рисунок и кнопку закрытия),
		  // задаём позицию и показваем элемент
		});

		
	}
		
		
			
});

