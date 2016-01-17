function openModal() {
    $('a[name=modal]').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $(id).show('fast');
        var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		$('#mask').fadeIn(1000); 
		$('#mask').fadeTo("slow",0.8); 
		var winH = $(window).height();
		var winW = $(window).width();
        $(id).css('top',  winH/2-$(id).height()/2);
		$(id).fadeIn(2000); 
        
        
        $('.dialog .close').click(function (e) {
			e.preventDefault();
			$('#mask, .dialog').hide();
		}); 
        
       	 $('.dialog .do-close').click(function (e) {
			e.preventDefault();
			$('#mask, .dialog').hide();
		}); 
        
		$('#mask').click(function () {
			$(this).hide();
			$('.dialog').hide();
		});
        
        var map = id.replace(/#[^\d]+(\d+)$/, 'map$1');
        
    //Начало
    if ($('#'+map).get(0).firstChild == null) {
        $(function addModal(){
	var r = Raphael(map, 700, 850),
		attributes = {
            fill: '#e6e7e8',
            stroke: '#B5B5B5',
            'stroke-width': 1,
            'stroke-linejoin': 'round'
        },
		arr = new Array();
        var table = $('.'+map);
	
	for (var country in russia[map]) {
		
		var obj4 = r.path(russia[map][country].path);
		obj4.attr(attributes);
		arr[obj4.id] = country;	
        
        var newRow = '<div class="parent-check"><p><label><input type="checkbox" name="check" id="'+ obj4.id +'" value="' + russia[map][country].name + '"/><span></span></label><span class="lab">' + russia[map][country].name + '</span></p></div>';
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
		  $('#'+map).next('.point').remove();
		  $('#'+map).after($('<div />').addClass('point'));
		  // удаляем существующий div с классом point и создаём ещё один
          if(map==="map1"){
		  $('.point')
          .html('<div><p><a name="premodal" href=#'+russia[map][arr[this.id]].url+'>Выберите районы<br />в данном округе</a></p></div>')		  
          .css({
		  left: point.x+(point.width)+350,
		  top: point.y+(point.height/2)+50
		  })
          .fadeIn();
          }
          else {
          $('.point')
          .html('<p>'+russia[map][arr[this.id]].name+'</p>')	  
		  .prepend($('<img />').attr('src', 'img/'+arr[this.id]+'.png'))
		  .css({
		  left: point.x+(point.width)+215,
		  top: point.y+(point.height/2)+10
		  })
          .fadeIn();
          }
		  // добавляем контент (название страны, рисунок и кнопку закрытия),
		  // задаём позицию и показваем элемент
           var checkbox = table.find('#'+this.id)
            var isChecked = checkbox.prop('checked');
            checkbox.prop('checked', !isChecked);
		});

		
	}
				
});
}
else {
    console.log("Done");
}
//Конец
        
    })
    }
       
$(document).ready(function()
{
	openModal();
	// add more functions if necessary
});    


$(document).on("click", 'a[name=premodal]', function(){
    var id = $(this).attr('href');
    $(id).show('fast');
    var map = id.replace(/#[^\d]+(\d+)$/, 'map$1');
    
    
    if ($('#'+map).get(0).firstChild == null) {
    $(function addModal(){
	var r = Raphael(map, 700, 850),
		attributes = {
            fill: '#e6e7e8',
            stroke: '#B5B5B5',
            'stroke-width': 1,
            'stroke-linejoin': 'round'
        },
		arr = new Array();
        var table = $('.'+map);
	
	for (var country in russia[map]) {
		
		var obj4 = r.path(russia[map][country].path);
		obj4.attr(attributes);
		arr[obj4.id] = country;	
        
        var newRow = '<div class="parent-check"><p><label><input type="checkbox" name="check" id="'+ obj4.id +'" value="' + russia[map][country].name + '"/><span></span></label><span class="lab">' + russia[map][country].name + '</span></p></div>';
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
		  $('#'+map).next('.point').remove();
		  $('#'+map).after($('<div />').addClass('point'));
		  // удаляем существующий div с классом point и создаём ещё один
          $('.point')
          .html('<p>'+russia[map][arr[this.id]].name+'</p>')	  
		  .prepend($('<img />').attr('src', 'img/'+arr[this.id]+'.png'))
		  .css({
		  left: point.x+(point.width)+215,
		  top: point.y+(point.height/2)+10
		  })
          .fadeIn();
		  // добавляем контент (название страны, рисунок и кнопку закрытия),
		  // задаём позицию и показваем элемент
           var checkbox = table.find('#'+this.id)
            var isChecked = checkbox.prop('checked');
            checkbox.prop('checked', !isChecked);
		});

		
	}
				
});
}
else {
    console.log("Done pre");
}
    
});