$(function(){	
	var rr = Raphael('map15', 700, 800),
		attributes = {
            fill: '#E7E7E7',
            stroke: '#C0C0BF',
            'stroke-width': 1,
            'stroke-linejoin': 'round'
        },
		arrr = new Array();
        var table = $('.uvao-city');
		
		for (var country in uvao) {
				
		var obj2 = rr.path(uvao[country].path);
				
		obj2.attr(attributes);
		
		arrr[obj2.id] = country;
        
        var newRow = '<div class="parent-check"><p><label><input type="checkbox" name="check" id="'+ obj2.id +'" value="' + uvao[country].name + '"/><span></span></label><span class="lab">' + uvao[country].name + '</span></p></div>';
            table.append(newRow);
		
		obj2.hover(function(){
		  this.animate({
			fill: '#3393D1',
			stroke: '#ffffff'
		  }, 300);
		}, function(){
		  this.animate({
			fill: attributes.fill,
			stroke: attributes.stroke
		  }, 300);
		});
		
		obj2.click(function(){
		  document.location.hash = arrr[this.id];
		  // меняем адрес документа (после #)
		  var point = this.getBBox(0);
		  // возвращает размер элемента
		  $('#map15').next('.point').remove();
		  $('#map15').after($('<div />').addClass('point'));
		  // удаляем существующий div с классом point и создаём ещё один
		  $('.point')
		  .html('<p>'+uvao[arrr[this.id]].name+'</p>')	  
		  .prepend($('<img />').attr('src', 'img/'+arrr[this.id]+'.png'))
		  .css({
		  left: point.x+(point.width)+215,
		  top: point.y+(point.height/2)+10
		  })
		  .fadeIn();
		  // добавляем контент (название страны, рисунок и кнопку закрытия),
		  // задаём позицию и показваем элемент
          // table.find('#'+this.id).attr('Checked','Checked');    
           
           var checkbox = table.find('#'+this.id)
              var isChecked = checkbox.prop('checked');
              
              checkbox.prop('checked', !isChecked);      
		});
		
	}
	
});