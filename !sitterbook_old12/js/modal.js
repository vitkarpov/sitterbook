function openModal() {
			
			$('a[name=modal]').click(function(e) {
				e.preventDefault();
				var id = $(this).attr('href');
				var maskHeight = $(document).height();
				var maskWidth = $(window).width();
				$('#mask').css({'width':maskWidth,'height':maskHeight});
				$('#mask').fadeIn(1000); 
				$('#mask').fadeTo("slow",0.8); 
				var winH = $(window).height();
				var winW = $(window).width();
				$(id).css('top',  winH/2-$(id).height()/2);
				$(id).css('left', '50%');
				$(id).css('marginLeft', -($(id).width()/2));
				$(id).fadeIn(2000); 
			});
            
			$('.window .close').click(function (e) {
				e.preventDefault();
				$('#mask, .window').hide();
			}); 
            
           	 $('.window .do-close').click(function (e) {
				e.preventDefault();
				$('#mask, .window').hide();
			}); 
            
			$('#mask').click(function () {
				$(this).hide();
				$('.window').hide();
			});
			
			var InputClass = 'blured';
			  var ClickedClass = 'clicked';
			  $('.'+InputClass).focus(function(){
				if ($(this).attr('defvalue') == undefined) 
					$(this).attr('defvalue',$(this).val());
				if (($(this).attr('blurvalue') == undefined)||($(this).attr('blurvalue') == $(this).attr('defvalue'))) 
				  $(this).val('').addClass(ClickedClass);
			  }).blur(function(){
				var blurvalue = $(this).val();
				if (blurvalue == '') 
				  $(this)
					.removeAttr('blurvalue')
					.val($(this).attr('defvalue'))
					.removeClass(ClickedClass);
				else 
				  $(this).attr('blurvalue',blurvalue);
			  });
			
			 if(($(".vhod").hasClass("active"))) {
				$(".block-message").css({
					borderRadius: "0 10px 10px 10px"
				});
			  }
			  else {
				$(".block-message").css({
					borderRadius: "10px"
				});
			  }	  
		}
$(document).ready(function()
{
	openModal();
	// add more functions if necessary
});