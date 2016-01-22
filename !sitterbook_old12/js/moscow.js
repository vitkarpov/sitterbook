$(function(){
	var r = Raphael('map4', 700, 850),
		attributes = {
            fill: '#e6e7e8',
            stroke: '#B5B5B5',
            'stroke-width': 1,
            'stroke-linejoin': 'round'
        },
		arr = new Array();
        var table = $('.moscow-city');
	
	for (var country in paths) {
		
		var obj4 = r.path(paths[country].path);
		obj4.attr(attributes);
		arr[obj4.id] = country;	
        
        var newRow = '<div class="parent-check"><p><label><input type="checkbox" name="check" id="'+ obj4.id +'" value="' + paths[country].name + '"/><span></span></label><span class="lab">' + paths[country].name + '</span></p></div>';
            table.append(newRow);	 
		
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
          .html('<div><p><a name="modal" href=#'+arr[this.id]+'>Выберите районы<br />в данном округе</a></p></div>')		  
          .css({
		  left: point.x+(point.width)+70,
		  top: point.y+(point.height/2)+50
		  })
		  .fadeIn();
		  // добавляем контент (название страны, рисунок и кнопку закрытия),
		  // задаём позицию и показваем элемент
           var checkbox = table.find('#'+this.id)
            var isChecked = checkbox.prop('checked');
            checkbox.prop('checked', !isChecked);
		});
        
         table.find('input:checkbox#'+this.id).on('change', function(){
              if($(this).prop('checked')){
                //обработка рисунка для этого чекбокса, если он активен
                this.obj4({
        			fill: '#FFF',
        			stroke: '#000'
        		  }, 300);
              }else{
                // обработка рисунка, если чекбокс не активен
                this.obj4({
        			fill: '#e6e7e8',
                    stroke: '#B5B5B5'
        		  }, 300);
              }
            });

		
	}
		
		
			
});

