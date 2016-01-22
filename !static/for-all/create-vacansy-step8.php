<!DOCTYPE html> 
<html>
<head>
	<title>SitterBook</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width" />
	<?php
		// Немного PHP, определим что агент содержит слово iPhone и все
		if (strpos($_SERVER['HTTP_USER_AGENT'],"iPhone")){
	?>
		<!-- Важный метатэг для портативных устройств на Safari, убирает пинч-зум, который используется при открытии любого сайта не под iPhone -->
		<meta name="viewport" content="width=1150">
		<link rel="stylesheet" href="iphone.css" type="text/css" />
	<?php
	} ?>
	
	<link rel="stylesheet" href="fonts.css" type="text/css" />
	<link rel="stylesheet" href="scss/main.css" type="text/css" />
	<link rel="stylesheet" href="mobile-style.css" type="text/css" />
	<link rel="stylesheet" href="jquery-ui-1.8.19.custom.css">
	
	<link href="css/cusel.css" rel="stylesheet" type="text/css" />
	
	<script src="js/jquery.js"></script>
	
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="js/polz.js"></script>
	
	<script src="js/raphael.js" type="text/javascript"></script>
	<script src="js/paths.js" type="text/javascript"></script>
	<script src="js/init3.js" type="text/javascript"></script>

	
	
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
		 
		 
		  $(document).on("click", ".plus", function() {
		
			
			if ($(".parent-check").hasClass("minus")) {
				$(".parent-check .plus").html("<img src='img/arrow-right.png' alt='' />");
			}
			
			$(this).parent().parent().parent().toggleClass("minus");
			
			if ($(".parent-check").hasClass("minus")) {
				$(".minus .plus").html("<img src='img/arrow-bottom2.png' alt='' />");
			}
	
			
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
			<div class="create-rezume create-vacansy">
				<div class="wrap">
					<div class="dva">
						<h1>Создание вакансии</h1>
						<p>Поля отмеченные * обязательны для заполнения</p>
					</div>
					<div class="work-map">
						<p class="title-border">Место работы</p>
						<div class="wrap-sels">
							<div class="select-city mbb">
								<p class="mb">Город: <span>*</span></p>
								<div class="wrap-sel">
								<div class="sel">
									<span>Санкт-Петербург</span>
									<div class="all-city">
										<p>Выберите город/а</p>
											<p><span>Москва</span></p>
											<p><span>Санкт-Петербург</span></p>
										<p>Московская область</p>
											<p><span>Апрелевка</span></p>
											<p><span>Балашиха</span></p>
											<p><span>Бронницы</span></p>
											<p><span>Верея</span></p>
											<p><span>Видное</span></p>
											<p><span>Волоколамск</span></p>
											<p><span>Воскресенск</span></p>
											<p><span>Высоковск</span></p>
											<p><span>Дедовск</span></p>
											<p><span>Дзержинский</span></p>
											<p><span>Дмитров</span></p>
											<p><span>Долгопрудный</span></p>
											<p><span>Дрезна</span></p>
											<p><span>Домодедово</span></p>
											<p><span>Дубна</span></p>
											<p><span>Егорьевск</span></p>
											<p><span>Железнодорожный</span></p>
											<p><span>Жуковский</span></p>
											<p><span>Зарайск</span></p>
											<p><span>Зеленоград</span></p>
										
									</div>
								</div>
								</div>
								<div class="clear"></div>
							</div>
							
							<div class="select-city mbb">
								<p class="mb">Район: <span>*</span></p>
								<div class="wrap-sel">
								<div class="sel">
									<span>Выберите район</span>
									<div class="all-city all-city2">
										<p>Выберите район</p>
											<p><span>Аэропорт</span></p>
											<p><span>Войковский</span></p>
											<p><span>Дмитровский</span></p>
											<p><span>Левобережный</span></p>
											<p><span>Сокол</span></p>
											<p><span>Хорошевский</span></p>
											<p><span>Беговой</span></p>
											<p><span>Восточное Дегунино</span></p>
											<p><span>Западное Дегунино</span></p>
											<p><span>Молжаниновский</span></p>
											<p><span>Тимирязевский</span></p>
											<p><span>Бескудниковский</span></p>								
											<p><span>Головинский</span></p>								
											<p><span>Коптево</span></p>								
											<p><span>Савеловский</span></p>								
											<p><span>Ховрино</span></p>								
									</div>
								</div>
								</div>
								<div class="clear"></div>
							</div>
							
							<div class="count-sel-and-map count-sel-and-map2">
								<p>
									<a href="#dialog9" name="modal">Выбрать район на карте</a>
								</p>
							</div>
							<div class="clear"></div>
							
							<div class="dop-input">
								<div class="inp">
									<p class="title">Индекс:</p>
									<input class="blured" type="text" name="index" value="123456" />
								</div>
								<div class="inp inp2">
									<p class="title">Улица:</p>
									<input class="blured" type="text" name="index" value="Название улицы" />
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<form>
						<div class="o-sebe">
							<p class="title-border">О вакансии</p>
							
							<div class="main-face">
								<p class="title">Контактное лицо: <span>*</span></p>
								<input class="blured" type="text" value="Виктория Сикрет" name="face">
							</div>
							
							<div class="textarea">
								<p class="title">Описание вакансии:</p>
								<textarea class="blured">Опишите, что вам нужно в нескольких словах, например: «Необходима няня, чтобы встречать ребенка из школы и быть с ним до возвращения родителя с работы ид и тп...</textarea>
								<div class="counter-textarea">
									<p class="bolshe">100</p>
									<p><span>Минимальная 100 символов<br />
									Макс 950 символов</span></p>
								</div>
							</div>
							
							<div class="two-block">
								<div class="sel sel2">
									<p class="title">Кол-во детей для ухода: <span>*</span></p>
									<div class="styled-select">
										<select name="grajd">
											<option>Любое</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="checking-box">
								<p class="title">Уход за детьми возраста: <span>*</span></p>
								
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
							
							
							<div class="graph">
								
								<div class="checking-box">
									<p class="title">Режим работы: <span>*</span></p>
									
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
								
								
							</div>
							
							<div class="zarplata">
							
								<div class="two-block">
									<p class="title">Стоимость оказания услуги, руб.: <span>*</span></p>
									<div class="in">
										<input class="blured" type="text" name="pay" value="200">
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
							
						</div>
						
						<div class="trebovania">
							<p class="title-border">Требования</p>
							
							<div class="two-block two-block2">
								<div class="inp-rad">
									<p class="title">Пол</p>
									<div class="radio">
										<label>
											<input class="ch" type="radio" name="test" value="all">
											<span></span>
										</label>
										<span class="lab">Любой</span>
									</div>
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
								
								<div class="checking-box">
									<p class="title">Отношение к курению:</p>
									
									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" name="test" value="yes">
											<span></span>
										</label>
										<span class="lab">
											Не курящая/-ий
										</span>
									</div>

								</div>
								
							</div>
							
							<div class="two-block">
								<div id="options">
									<p>Возраст</p>
									<label class="m-l" for="year">от:
										<input type="text" name="price" id="year3">
									</label>
									
									<label for="price2">до:
										<input type="text" name="year2" id="year4">
									</label>
									<div id="slider_price3"></div>
								</div>
								
								<div class="sel">
									<p class="title">Опыт работы:</p>
									<div class="styled-select">
										<select name="grajd">
											<option>Любой</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
									</div>
								</div>
								
							</div>
							
							<div class="two-block">
								
								<div class="sel sel2">
									<p class="title">Гражданство:</p>
									<div class="styled-select">
										<select name="grajd">
											<option>Любое</option>
										</select>
									</div>
								</div>
								
								<div class="checking-box">
									<p class="title">Опыт работы с детьми возраста:</p>
									
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
											от 7 до 10 лет
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
											от 10 лет и старше
										</span>
									</div>
									
									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" name="test" value="yes">
											<span></span>
										</label>
										<span class="lab">
											от 4 до 6 лет
										</span>
									</div>
									
									
									
									
									
									
									
								</div>
								
							</div>
							
							<div class="two-block">
								
								<div class="sel sel3">
									<p class="title">Знание языков:</p>
									<div class="styled-select">
										<select name="grajd">
											<option>Любых</option>
										</select>
									</div>
								</div>
							</div>
							
						</div>
						
	
						
						<div class="dop-treb">
							<p class="title-border">Дополнительные требования</p>
							<p class="chh">Отметьте если данные критерии являются принципиальными для вас</p>
							
							<div class="two-block">
								<div class="checking-box">
									<p class="title">Наличие водительских прав:</p>
									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" value="yes" name="test">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
								</div>
								
								<div class="checking-box">
									<p class="title">Наличие своего автотранспорта:</p>
									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" value="yes" name="test">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
								</div>
							</div>
							
							<div class="two-block">
								<div class="checking-box">
									<p class="title">Готовность ухаживать за детьми,<br />которым требуется особый уход<br /> по медицинским и/или иным показаниям:</p>
									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" value="yes" name="test">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
								</div>
								
								<div class="checking-box">
									<p class="title">Готовность помогать родителю<br />в выполнении отдельно и дополнительно<br />оговариваемых домашних делах</p>
									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" value="yes" name="test">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
								</div>
							</div>
							
							<div class="two-block">
								<div class="checking-box">
									<p class="title">Отсутствие стресса и аллерги<br />к домашним животным:</p>
									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" value="yes" name="test">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
								</div>
								
								<div class="checking-box">
									<p class="title">Работа за рубежом:</p>
									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" value="yes" name="test">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
								</div>
							</div>	
							
							<div class="two-block">
								<div class="checking-box">
									<p class="title">Готовность приступить в кратчайшие сроки:</p>
									<div class="checkbox">
										<label>
											<input class="ch" type="checkbox" value="yes" name="test">
											<span></span>
										</label>
										<span class="lab">Да</span>
									</div>
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
								<p>При желании можете загрузить свое фото<br />или фото своих детей</p>
								<p><span>Формат: jpg, gif, png.</span><span>Максимальный размер файла 2Mb.</span></p>
							</div>
						</div>
					
						
						<div class="contacts">
							<p class="title-border">Контакты</p>
							<div class="two-block">
								<div class="in">
									<p class="title">Телефон: <span>*</span></p>
									<input class="blured" type="text" name="phone" value="+7 (495) 123 45 67">
								</div>
							</div>
						</div>
						
						
						
						<div class="buttons">
							<a class="save" href="#">Сохранить</a>
							<a class="cancel" href="#">Отменить не сохраняя</a>
						</div>
						
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
		<div id="boxes8">
			<div id="dialog8" class="window">
				<div class="wrapper">
					<div class="prompt">
						<p class="title-border">
							<span>Место работы</span>
						</p>
						<div class="block">
							<img src="img/icon1.png" alt="" />
							<p>Определите<br />место работы няни</p>
						</div>
						<div class="block">
							<img src="img/icon11.png" alt="" />
							<p>Загрузите карту для более<br />безошибочного ориентирования<br />на местности</p>
						</div>
						<div class="block">
							<img src="img/icon111.png" alt="" />
							<p>Вас будут находить няни,<br />заинтересованные в работе<br />по указанному вами адресу</p>
						</div>
						<div class="clear"></div>
						<div class="but">
							<a href="#">Продолжить</a>
							<div class="checkbox">
								<label>
									<input class="ch" type="checkbox" value="yes" name="test">
									<span></span>
								</label>
								<span class="lab">Не показывать больше подсказки</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="boxes9">
			<div id="dialog9" class="window">
				<a href="#" class="link close"/>X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите место работы няни</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите район<br />Санкт-Петербурга</p>
								<div class="wrap-check">
								
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Все районы</span>
										</p>										
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Адмиралтейский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Василеостровский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Выборгский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Калининский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Кировский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Колпинский</span>
										</p>
									</div>	
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Красногвардейский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Красносельский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Кронштадтский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Курортный</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Московский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Невский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Петроградский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Петродворцовый</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Приморский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Пушкинский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Фрунзенский</span>
										</p>
									</div>
									
									<div class="parent-check2">	
										<p>
											<label><input type="radio" name="check" value="6" /><span></span></label>
											<span class="lab">Центральный</span>
										</p>
									</div>
																											
									
									<a class="okey" href="#">Ок</a>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map">
						<div class="bl">
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div id="map3" class="marginMapPiter"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="mask"></div>
	</div>
</body>
</html>