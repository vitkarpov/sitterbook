$(function(){
	var r = Raphael('svao', 700, 850),
		attributes = {
            fill: '#e6e7e8',
            stroke: '#B5B5B5',
            'stroke-width': 1,
            'stroke-linejoin': 'round'
        },
		arr = new Array();
	
	for (var country in paths3) {
		
		var obj5 = r.path(paths3[country].path);
		
		
		obj5.attr(attributes);
		
		
		arr[obj5.id] = country;		 
		
		obj5.hover(function(){
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
		
		
		obj5.click(function(){
		  document.location.hash = arr[this.id];
		  // меняем адрес документа (после #)
		  var point = this.getBBox(0);
		  // возвращает размер элемента
		  $('#svao').next('.point').remove();
		  $('#svao').after($('<div />').addClass('point'));
		  // удаляем существующий div с классом point и создаём ещё один
		  $('.point')
		  .html('<p>'+paths3[arr[this.id]].name+'</p>')	  
		  .prepend($('<img />').attr('src', 'img/'+arr[this.id]+'.png'))
		  .css({
		  left: point.x+(point.width)+215,
		  top: point.y+(point.height/2)+10
		  })
		  .fadeIn();
		  // добавляем контент (название страны, рисунок и кнопку закрытия),
		  // задаём позицию и показваем элемент
		});

		
	}
		
		
			
});

