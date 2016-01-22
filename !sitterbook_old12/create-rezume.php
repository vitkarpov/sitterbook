<!DOCTYPE html> 
<html>
<head>
	<title>SitterBook</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <meta name="robots" content="noindex, nofollow"/>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width" />
	<?php
		// Немного PHP, определим что агент содержит слово iPhone и все
		if (strpos($_SERVER['HTTP_USER_AGENT'],"iPhone")){
	?>
		<!-- Важный метатэг для портативных устройств на Safari, убирает пинч-зум, который используется при открытии любого сайта не под iPhone -->
		<meta name="viewport" content="width=1150"/>
		<link rel="stylesheet" href="css/iphone.css" type="text/css" />
	<?php
	} ?>
    
    <!-- Стили -->
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="stylesheet" href="fonts.css" type="text/css" />
	<link rel="stylesheet" href="css/mobile-style.css" type="text/css" />
	<link rel="stylesheet" href="css/jquery-ui.css"/>
	<link rel="stylesheet" href="css/cusel.css"  type="text/css" />
	
	
    <!-- Javascripts -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/datepicker-ru.js"></script>
    
	<script type="text/javascript" src="js/polz.js"></script>
	<script type="text/javascript" src="js/raphael.js"></script>
	<script type="text/javascript" src="js/paths.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
	<script type="text/javascript" src="js/init2.js"></script>
	
    <!-- Добавленные скрипты -->
    <script type="text/javascript">
        $.datepicker.setDefaults( $.datepicker.regional[ "" ] );
        $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );  
            $(function() {
                $( "#datepicker" ).datepicker({
                     changeMonth: true,
                     changeYear: true,
                     showOtherMonths: true,
                     showAnim: "slideDown",
                     yearRange: '-90:-16'
                })
            });
    </script>
    
     <script type="text/javascript">
     $(document).on("click", ".add-city", function() {
            $(".select-city .add-city").before("<div class='wrap-sel'> <div class='sel'> <select name='city' class='city'> <option disabled='disabled' selected='selected'>Город</option> <div class='all-city'> <optgroup label='Выберите город'> <option value='1'>Москва</option> <option value='2'>Санкт-Петербург</option> <optgroup label='Московская область'> <option value='3'>Апрелевка</option> <option value='4'>Балашиха</option> <option value='5'>Бронницы</option> <option value='6'>Верея</option> <option value='7'>Видное</option> <option value='8'>Волоколамск</option> <option value='9'>Воскресенск</option> <option value='10'>Высоковск</option> <option value='11'>Дедовск</option> <option value='12'>Дзержинский</option> <option value='13'>Дмитров</option> <option value='14'>Долгопрудный</option> <option value='15'>Дрезна</option> <option value='16'>Домодедово</option> <option value='17'>Дубна</option> <option value='18'>Егорьевск</option> <option value='18'>Железнодорожный</option> <option value='19'>Жуковский</option> <option value='20'>Зарайск</option> <option value='21'>Зеленоград</option> </div> </select> </div> <!--Округи и карта МСК--> <div class='county-maps'> <div class='sel'> <select name='county' class='county'> <option disabled='disabled' selected='selected'>Округ</option> <div class='all-city'> <option value='all'>Все округа</option> <option value=''>СЗАО</option> <option value=''>СВАО</option> <option value=''>ЗАО</option> <option value=''>ЦАО</option> <option value=''>ВАО</option> <option value=''>ЮЗАО</option> <option value=''>ЮАО</option> <option value=''>ЮВАО</option> <option value=''>ЗелАО</option> <option value=''>НАО</option> <option value=''>ТАО</option> </div> </select> </div> <div class='count-sel-and-map'> <span>Выбрано 11 районов</span> <p><a name='modal' href='#dialog8' href='#'>Выбрать округа и районы на карте</a></p> </div> </div><div class='remove'></div></div> </div><div class='clear'></div>");
         });
		
		 $(document).on("click", ".select-city .wrap-sel .remove", function() {
			$(this).parent().remove();
		 })
         
     $(document).on("click", ".add-city", function(){
            $(".city").parent(".sel").change(
                function(){
                var valOpt=$(this).find('option:selected').val();
                if(valOpt=="1")$(this).next(".county-maps").show("fast");
                else  $(this).next(".county-maps").hide("fast")
                })
            });
    </script>
    
	<script>
		var i = 2;
		$(document).on("click", ".auth a", function() {
			if (i % 2 == 0) {
				$(this).css({
					background: 'url(img/arrow-bottom-active.png) left center no-repeat'
				});
				$(".form-auth").css({
					display: 'block'
				});
				$(".auth").addClass("auth2");
			}
			else {
				$(this).css({
					background: 'url(img/arrow-bottom.png) left center no-repeat'
				});
				$(".form-auth").css({
					display: 'none'
				});
				$(".auth").removeClass("auth2");
			}
			i++;
		});
		
		var j = 2;
		$(document).on("click", ".favorites", function() {
			if (j % 2 == 0) {
				$(this).css({
					background: 'url(img/heart.png) left center no-repeat'
				});
				$(this).html("В избранном");
			}
			else {
				$(this).css({
					background: 'url(img/heart2.png) left center no-repeat'
				});
				$(this).html("Добавить в избранное");
			}
			j++;
		});
		
		var k = 2;
		$(document).on("click", ".button p a", function() {
			if (k % 2 == 0) {
				$(".dop").css({
					display: "block"
				});
				$(this).html("Скрыть дополнительные фильтры");
			}
			else {
				$(".dop").css({
					display: "none"
				});
				$(this).html("Показать все фильтры");
			}
			k++;
		});

		$(document).on("click", ".info-field a", function() {
				$(this).css({
					display: "none"
				});

				$(".inp").css({
					display: "block"
				});
		});
		
		 $(document).on("click", ".mess .ch", function() {
			if($(this).prop('checked')) {
				$(this).parent().parent().parent().addClass("bg");
			}
			else {
				$(this).parent().parent().parent().removeClass("bg");
			}
		});
        
		
		 $(document).on("click", ".add-course", function() {
			$(".course .add-course").before("<div class='inputs'><input class='blured' type='text' name='cur' value='' /><input class='year blured' type='text' name='year' value='' /><div class='remove'></div></div>");
		});
		
		 $(document).on("click", ".course .inputs .remove", function() {
			$(this).parent().remove();
		 });
         
         
		 
		 $(document).on("click", ".add-recommend", function() {
			$(".recommend .add-recommend").before("<div class='three-inp'><input class='named blured' type='text' name='name' value='' /><input class='phones blured' type='text' name='phone' value='' /><input class='mail blured' type='text' name='mail' value='' /><div class='remove'></div></div>");
		});
		
		 $(document).on("click", ".recommend .three-inp .remove", function() {
			$(this).parent().remove();
		 });



		 
		 $(document).on("click", ".select-city .sel", function() {
		 
			$(".all-city", this).css({
				display: "block"
			});
			
		 });
		 
		 $(document).on("click", ".cal", function() { 
			$(".calendar").toggleClass("open");	
		 });
		
	</script>
	<script>			
		$(document).ready(function () {
			
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


					  
			
		});
	</script>
</head>
<body>
	<div id="container">
	
		<!-- Шапка -->
		<div class="header">
			<div class="wrap">
				<div class="logo">
					<a href="#">
						<img src="img/logo.png" alt="" />
					</a>
				</div>
				<div class="registration">
					<div class="success-auth">
						<a href="#">Папа римский</a>
					</div>
				</div>
				<div class="header-menu">
					<nav>
						<ul>
							<li>
								<a href="#">Няни</a>
							</li>
							<li>
								<a href="#">Вакансии</a>
							</li>
							<li>
								<a href="#">Рекомендации</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!-- Конец Шапки -->
		
		<!-- Контент -->
		<div class="content">
			<div class="create-rezume">
				<div class="wrap">
					<h1>Создание резюме</h1>
                    <!-- Начало формы -->
                    <form action="" method="" id="">
					<div class="work-map">
						<p class="title-border">Возможное место работы</p>
						<div class="select-city">
							<p class="mb">Выберите город\а, где вы готовы работать:</p>
							<div class="wrap-sel">
							<div class="sel">
                                <select name="city" class="city">
								<option disabled="disabled" selected="selected">Город</option>
								<div class="all-city">
                                    <optgroup label="Выберите город">
										<option value="1">Москва</option>
										<option value="2">Санкт-Петербург</option>
                                        <optgroup label="Московская область">
										<option value="3">Апрелевка</option>
										<option value="4">Балашиха</option>
										<option value="5">Бронницы</option>
										<option value="6">Верея</option>
										<option value="7">Видное</option>
										<option value="8">Волоколамск</option>
										<option value="9">Воскресенск</option>
										<option value="10">Высоковск</option>
										<option value="11">Дедовск</option>
										<option value="12">Дзержинский</option>
										<option value="13">Дмитров</option>
										<option value="14">Долгопрудный</option>
										<option value="15">Дрезна</option>
										<option value="16">Домодедово</option>
										<option value="17">Дубна</option>
										<option value="18">Егорьевск</option>
										<option value="18">Железнодорожный</option>
										<option value="19">Жуковский</option>
										<option value="20">Зарайск</option>
										<option value="21">Зеленоград</option>
								</div>
                                </select>
							</div>
                                <!--Округи и карта МСК-->
                                <div class="county-maps">
                                    <div class="sel">
                                        <select name="county" class="county">
            								<option disabled="disabled" selected="selected">Округ</option>
            								    <div class="all-city">
                                                    <option value="all">Все округа</option>
                                                    <option value="">СЗАО</option>
                                                    <option value="">СВАО</option>
                                                    <option value="">ЗАО</option>
                                                    <option value="">САО</option>
                                                    <option value="">ЦАО</option>
                                                    <option value="">ВАО</option>
                                                    <option value="">ЮЗАО</option>
                                                    <option value="">ЮАО</option>
                                                    <option value="">ЮВАО</option>
                                                    <option value="">ЗелАО</option>
                                                    <option value="">НАО</option>
                                                    <option value="">ТАО</option>
                                                </div>
                                        </select>        
                                    </div>  
                                    <div class="count-sel-and-map">
        								<span>Выбрано 11 районов</span>
        								<p><a name="modal" href="#dialog8" href="#">Выбрать округа и районы на карте</a></p>
        							</div>
                                </div>          
							</div>
							<div class="clear"></div>
                            <!--Добавить город-->
                            <span class="add-city">+ Добавить город</span>
						</div>
					</div>
						<div class="o-sebe">
							<p class="title-border">О себе</p>
							<div class="textarea">
								<textarea class="blured">Расскажите о себе, о своем опыте и умениях, применяемых при работе няней, поделитесь почему и как вы решили стать няней, почему вы любите свою работу и тд и тп...</textarea>
								<div class="counter-textarea">
									<p class="bolshe">100</p>
									<p><span>Минимальная 100 символов<br />
									Макс 950 символов</span></p>
								</div>
							</div>
							<div class="two-block two-block2">
								<div class="inp-rad">
									<p class="title">Пол</p>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="test" value="female">
											<span></span>
										</label>
										<span class="lab">Жен</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="test" value="male">
											<span></span>
										</label>
										<span class="lab">Муж</span>
									</div>
								</div>
                                <!-- Календарь -->
								<div class="birthday">
									<p class="title">Дата рождения:</p>
									<input type="text" name="birthday" id="datepicker" class="blured cal" placeholder="25 ноября 1983" value=" "/>
								</div>
                                
							</div>
							<div class="two-block">
								<div class="sel">
									<p class="title">Гражданство</p>
									<div class="styled-select">
										<select name="grajd">
											<option>Любое</option>
											<option>Гражданство2</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="two-block">
								<div class="inp-rad">
									<p class="title">Наличие водительских прав</p>
									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="prava" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="prava" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>
								
								<div class="inp-rad">
									<p class="title">Наличие своего автотранспорта</p>
									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="auto" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="auto" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>
							</div>
							
							<div class="two-block">
								<div class="sel child">
									<p class="title">Комфортное кол-во детей для ухода:</p>
									<div class="styled-select">
										<select name="child">
											<option>Любое</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="two-block">
								<div class="inp-rad">
									<p class="title">Аллергия и стресс к домашним животным</p>
									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="animal" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="animal" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>
								
								<div class="inp-rad">
									<p class="title">Отношение к курению</p>
									<div class="radio w42">
										<label>
											<input class="ch" type="radio" name="smoking" value="yes">
											<span></span>
										</label>
										<span class="lab">Курю</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="smoking" value="no">
											<span></span>
										</label>
										<span class="lab">Не курю</span>
									</div>
								</div>
							</div>
							
							<div class="two-block">
								<div class="inp-rad">
									<p class="title">Возможен переезд</p>
									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="pereezd" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="pereezd" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>
							</div>
							
							<div class="two-block">
								<div class="inp-rad">
									<p class="title">Готовность помогать родителю<br />в выполнении отдельно и дополнительно<br />
									оговариваемых домашних делах:</p>
									<div class="radio w60">
										<label>
											<input class="ch" type="radio" name="homework" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="homework" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>
								
								<div class="inp-rad">
									<p class="title">Готовность ухаживать за детьми,<br />которым требуется особый уход<br />
									по медицинским и/или иным показаниям:</p>
									<div class="radio w42">
										<label>
											<input class="ch" type="radio" name="childs" value="yes">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="childs" value="no">
											<span></span>
										</label>
										<span class="lab">Нет</span>
									</div>
								</div>
							</div>
							
							<div class="video">
								<p class="title">Видеорезюме</p>
								<div class="you">
									<input type="text" name="video" value="http://youtube.com/watch?v=" />
									<button>ОК</button>
								</div>
								<span>Добавьте ссылкку на ваше видеорезюме размещенное на сайте YouTube или RuTube</span>
							</div>
							
						</div>
						
						<div class="education">
							<p class="title-border">Образование</p>
							
							<div class="course">
								<p class="title">Курсы, повышение квалификации</p>
								<div class="inputs">
									<input class="blured" type="text" name="cur" value="Название" /> 
									<input class="year blured" type="text" name="year" value="Год окончания" />
								</div>
								<span class="add-course">+ Указать еще одно повышение квалификации или курсы</span>
							</div>
							
							<div class="two-block">
								<div class="sel">
									<p class="title">Знание языков</p>
									<div class="styled-select">
										<select name="grajd">
											<option>Выбрать языки</option>
											<option>Русский</option>
											<option>Английский</option>
										</select>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="work-stage">
							<p class="title-border">Опыт работы</p>
							
							<div class="two-block">
								<div class="sel">
									<p class="title">Опыт работы</p>
									<div class="styled-select">
										<select name="grajd">
											<option>1 год</option>
											<option>2 года</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="checking-box">
								<p class="title">Опыт ухода за детьми возрастных групп:</p>
								
								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										до 1 года
									</span>
								</div>
								
								<div class="checkbox w185">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										от 4 до 6 лет
									</span>
								</div>
								
								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										от 10 лет и старше
									</span>
								</div>
								
								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										от 1 года до 3 лет
									</span>
								</div>
								
								<div class="checkbox w185">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										от 7 до 10 лет
									</span>
								</div>
								
							</div>
							
						</div>		
						
						<div class="graph">
							<p class="title-border">График работы</p>
							
							<div class="checking-box">
								<p class="title">Предпочитаемый режим работы:</p>
								
								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										постоянный<br />
										(от 2 до 6 часов в день)
									</span>
								</div>
								
								<div class="checkbox w185">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										разовый выход
									</span>
								</div>
								
								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										без проживания
									</span>
								</div>
								
								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										постоянный<br />
										(от 6 часов в день)
									</span>
								</div>
								
								<div class="checkbox w185">
									<label>
										<input class="ch" type="checkbox" name="test" value="yes">
										<span></span>
									</label>
									<span class="lab">
										с проживанием
									</span>
								</div>
								
							</div>
							
							
							<div class="inp-rad">
								<p class="title">Готовность приступить в кратчайшие сроки:</p>
								<div class="radio w42">
									<label>
										<input class="ch" type="radio" name="childs" value="yes">
										<span></span>
									</label>
									<span class="lab">Да</span>
								</div>
								<div class="radio">
									<label>
										<input class="ch" type="radio" name="childs" value="no">
										<span></span>
									</label>
									<span class="lab">Нет</span>
								</div>
							</div>
							
						</div>
						
						<div class="photograph">
							<p class="title-border">Фотографии</p>
							<div class="clear"></div>
							<div class="icons">
								<div class="img">
									<img src="img/avass.png" alt="" />
									<div class="del">
										<a href="#">Удалить Х</a>
									</div>
								</div>
								<a href="#">
									<img src="img/add-photos.png" alt="" />
								</a>
							</div>
							<div class="info">
								<p>Добавление фото увеличивает ваши шансы,<br />что родитель выберет вас</p>
								<p><span>Формат: jpg, gif, png.</span><span>Максимальный размер файла 2Mb.</span></p>
							</div>
						</div>
						
						<div class="recommend">
							<p class="title-border">Рекомендации от родителей</p>
							<div class="inputs">
								<p class="title">Напишите контакты родителей у которых вы работали няней:</p>
								<div class="three-inp">
									<input class="named blured" type="text" name="name" value="Валентина Якубович" />
									<input class="phones blured" type="text" name="phone" value="+7 (903) 568-48-33" />
									<input class="mail blured" type="text" name="mail" value="valakub@ya.ru" />
								</div>
								<span class="add-recommend"  href="#">+ Добавить еще одну</span>
							</div>
						</div>
						
						<div class="contacts">
							<p class="title-border">Контакты</p>
							<div class="two-block">
								<div class="in">
									<p class="title">Телефон:</p>
									<input class="blured" type="text" name="phone" value="+7 (495) 123 45 67">
								</div>
								<div class="in">
									<p class="title">Дополнительный email:</p>
									<input class="blured" type="text" name="maiil" value="Email">
								</div>
							</div>
						</div>
						
						<div class="zarplata">
							<p class="title-border">Пожелания по зарплате</p>
							<div class="two-block">
								<div class="in">
									<p class="title">Зарплата, руб.:</p>
									<input class="blured" type="text" name="pay" value="от 200">
								</div>
								<div class="inp-rad">
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="pay" value="chas">
											<span></span>
										</label>
										<span class="lab">в час</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="pay" value="month">
											<span></span>
										</label>
										<span class="lab">в месяц</span>
									</div>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="pay" value="dogovor">
											<span></span>
										</label>
										<span class="lab">по договоренности</span>
									</div>
								</div>
							</div>
						</div>
						
						<div class="buttons">
							<button type="submit" name="" class="save" value="Cохранить">Сохранить</button>
							<a class="cancel" href="#">Отменять не сохраняя</a>
						</div>
					<!-- Конец формы -->
					</form>
				</div>
			</div>
		</div>
		<!-- Конец Контента -->
		
		<!-- Подвал -->
		<div class="footer">
			<div class="wrap wrap2">
				<div class="footer-menu">
					<ul>
						<li>
							<a href="#">Миссия нашего сайта</a>
						</li>
						<li>
							<a href="#">Публичная оферта и правовая информация</a>
						</li>
						<li>
							<a href="#">Как пользоваться сайтом</a>
						</li>
						<li>
							<a href="#">Дополнительные услуги</a>
						</li>
						<li>
							<a href="#">Контакты</a>
						</li>
					</ul>
					<p class="copyright">&copy; 2014 ООО Ситтербук.ру, Bсе права защищены.</p>
				</div>
				<div class="social">
					<ul>
						<li>
							<a class="od" href="#"></a>
						</li>
						<li>
							<a class="vk" href="#"></a>
						</li>
						<li>
							<a class="fb" href="#"></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Конец подвала -->
		
		<div id="boxes">
			<div id="dialog" class="window">
				<p class="title-info-vacansy">Написать сообщение</p>
				<a href="#" class="link close"/>X</a>
				<form name="myform" action="send.php" method="post">
					<textarea class="blured" name="texts">Напишите сообщение</textarea>
					<button name="send">Отправить</button>
				</form>
			</div>
		</div>	
		<div id="boxes2">
			<div id="dialog2" class="window">
				<p class="title-info-vacansy">Адрес</p>
				<a href="#" class="link close"/>X</a>
				<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=a7UnoPrw7X-jlkDBBoe4hLOZAov4H5xy&width=600&height=450"></script>
			</div>
		</div>
		<div id="boxes3">
			<div id="dialog3" class="window">
				<a href="#" class="link close"/>X</a>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/aXeIRNL-uic?list=PLEAkEwgua6PjTc-uTXBYfNJS5BuzOVL50" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		<div id="boxes4">
			<div id="dialog4" class="window">
				<a href="#" class="link close"/>X</a>
				<iframe width="560" height="315" src="//rutube.ru/play/embed/7783029" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>
			</div>
		</div>
		<div id="boxes5">
			<div id="dialog5" class="window">
				<a href="#" class="link close"/>X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy">Возможное место работы территориально</p>
					<div class="clear"></div>
					<div class="citys citys2">
						<div class="work">
							<p>Город</p>
							<div class="styled-select styled-select2">
								<select name="grajd">
									<option>Санкт Петербург</option>
								</select>
							</div>
						</div>
						<div class="work">
							<p>Район</p>
							<div class="styled-select styled-select2">
								<select name="grajd">
									<option>Кронштадский, Выборг...</option>
								</select>
							</div>
							<div class="block-sel">	
								<p>Выберите район /ы</p>
								<div class="wrap-check">
									<div class="check">
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Все районы</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Адмиралтейский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Василеостровский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Выборгский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Калининский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Кировский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Колпинский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Красногвардейский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Красносельский район</span>
										</p>	
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Красногвардейский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Кронштадтский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Курортный район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Московский район</span>
										</p>	
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Невский район</span>
										</p>			
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Область</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Петроградский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Петродворцовый район</span>
										</p>	
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Приморский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Пушкинский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Фрунзенский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Центральный район</span>
										</p>
										<a href="#">Ок</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="map"></div>
				</div>
			</div>
		</div>
		<div id="boxes6">
			<div id="dialog6" class="window">
				<a href="#" class="link close"/>X</a>
				<div class="wrapper">
					<p class="title-info-vacansy">Возможное место работы территориально</p>
					<div class="clear"></div>
					<div class="citys citys2">
						<div class="work">
							<p>Город</p>
							<div class="styled-select styled-select2">
								<select name="grajd">
									<option>Санкт Петербург</option>
								</select>
							</div>
						</div>
						<div class="work">
							<p>Район</p>
							<div class="styled-select styled-select2">
								<select name="grajd">
									<option>Кронштадский, Выборг...</option>
								</select>
							</div>
							<div class="block-sel">	
								<p>Выберите район /ы</p>
								<div class="wrap-check">
									<div class="check">
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Все районы</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Адмиралтейский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Василеостровский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Выборгский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Калининский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Кировский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Колпинский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Красногвардейский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Красносельский район</span>
										</p>	
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Красногвардейский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Кронштадтский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Курортный район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Московский район</span>
										</p>	
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Невский район</span>
										</p>			
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Область</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Петроградский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Петродворцовый район</span>
										</p>	
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Приморский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Пушкинский район</span>
										</p>		
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Фрунзенский район</span>
										</p>
										<p>
											<label><input type="checkbox" name="check" value="6" /><span></span></label>
											<span>Центральный район</span>
										</p>
										<a href="#">Ок</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="map2"></div>
				</div>
			</div>
		</div>		
		<div id="boxes7">
			<div id="dialog7" class="window">
				<a href="#" class="link close"/>X</a>
				<div class="wrapper">
					<p class="title-info-vacansy">Возможное место работы территориально</p>
					<div class="clear"></div>
					<div class="citys citys2">
						<div class="work">
							<p>Город</p>
							<div class="styled-select styled-select2">
								<select name="grajd">
									<option>Смоленск</option>
								</select>
							</div>
							<div class="block-sel">	
								<p>Выберите город /а</p>
								<div class="wrap-check">
									<div class="check">
										<p>
											<span>Все районы</span>
										</p>
										<p>
											<span>Адмиралтейский район</span>
										</p>
										<p>
											<span>Василеостровский район</span>
										</p>
										<p>
											<span>Выборгский район</span>
										</p>
										<p>
											<span>Калининский район</span>
										</p>
									</div>
								</div>
								<p>Выберите город /а</p>
								<div class="wrap-check">
									<div class="check">
										<p>
											<span>Все районы</span>
										</p>
										<p>
											<span>Адмиралтейский район</span>
										</p>
										<p>
											<span>Василеостровский район</span>
										</p>
										<p>
											<span>Выборгский район</span>
										</p>
										<p>
											<span>Калининский район</span>
										</p>
										<a href="#">Ок</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="smolensk">
						<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=rlWtQVO4ALfhCkji0vpt6OXLQnZ4wQTy&width=600&height=450"></script>
					</div>
				</div>
			</div>
		</div>
		<div id="mask"></div>
	</div>
</body>
</html>