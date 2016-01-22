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
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="js/polz.js"></script>
	
	<script src="js/raphael.js" type="text/javascript"></script>
	<script src="js/paths.js" type="text/javascript"></script>
	<script src="js/init.js" type="text/javascript"></script>
	<script src="js/init2.js" type="text/javascript"></script>
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
		
		$(document).on("click", ".work .sel", function() {
		 
			$(".all-city", this).css({
				display: "block"
			});
			
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
					<a class="hov" href="#">Регистрация</a>
					<div class="auth">
						<a href="#">Войти</a>
						<div class="form-auth">
							<form name="myform" action="#" method="post">
								<input type="text" name="login" value="example@sitterbook.ru" />
								<input type="password" name="pass" value="12345678" />
								<input type="submit" name="send" value="Войти" />
								<div class="checkbox">
									<label>
										<input class="ch" type="checkbox" checked="checked" value="yes" name="test">
										<span></span>
									</label>
									<span class="lab">Запомнить меня</span>
								</div>
								<a class="for-pass" href="#">Забыли пароль?</a>
								<div class="clear"></div>
								<p class="soc">или для входа используйте</p>
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
							</form>
						</div>
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
			<div class="rezume">
				<div class="wrap">
					<div class="form-rezume">
						<form name="myform" action="#" method="post">
							<div class="work workadd">
								<p>Возможное место работы</p>
								
								
								<!--
								<div class="work marg">
									<div class="styled-select styled-select2">
										<select name="grajd">
											<option>Москва</option>
											<option>Санкт-Петербург</option>
											<option>Апрелевка</option>
											<option>Балашиха</option>
											<option>Верея</option>
											<option>Видное</option>
										</select>
									</div>
								</div>-->
								
								<div class="gorod first">
									<p class="gorod-city">Москва</p>
									
									<div class="work marg">
										<div class="sel">
											<span>Округ</span>
											<div class="all-city">
												<p>Выберите округ/а</p>
												
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															Все округа
														</span>
													</div>
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															СЗАО
														</span>
													</div>
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															САО
														</span>
													</div>
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															СВАО
														</span>
													</div>
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															ЗАО
														</span>
													</div>
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															ЦАО
														</span>
													</div>
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															ВАО
														</span>
													</div>		
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															ЮЗАО
														</span>
													</div>	
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															ЮАО
														</span>
													</div>	
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															ЮВАО
														</span>
													</div>	
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															ЗелАО
														</span>
													</div>	
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															НАО
														</span>
													</div>
													
													<div class="checkbox">
														<label>
															<input class="ch" type="checkbox" name="test" value="yes">
															<span></span>
														</label>
														<span class="lab">
															ТАО
														</span>
													</div>

												<a href="#">Ок</a>
											</div>
										</div>
									</div>
									
									<p class="gorod-okrug">Округа</p>
									<div class="block-goroda">
										<span>СЗАО X</span>
										<span>ЮЗАО X</span>
										<span>ЮЗАО X</span>
										<span>ЮЗАО X</span>
									</div>
									<p class="select">Выбрано 11 районов</p>
								</div>
								
								

								
								
								
								<div class="iconmap"><a class="addokrug" href="#">Выбрать округа и районы на карте</a></div>
							
								<div><a class="clear" href="#">Очистить</a></div>
								<div><a class="addcity" href="#">+ Добавить город</a></div>						
							</div>
							<div id="options">
								<p>Возраст</p>
								<label class="m-l" for="year">от:
									<input type="text" name="price" id="year">
								</label>
								
								<label for="price2">до:
									<input type="text" name="year2" id="year2">
								</label>
								<div id="slider_price"></div>
							</div>
							<div class="sex">
								<p class="pol">Пол</p>
								<p>
									<label><input type="radio" name="s" value="female" /><span></span></label>
									<span>Жен</span>
								</p>
								<p>
									<label><input type="radio" name="s" value="male" /><span></span></label>
									<span>Муж</span>
								</p>
								<p class="last">
									<label><input type="radio" name="s" value="all" /><span></span></label>
									<span>Любой</span>
								</p>
							</div>
							<div class="clear"></div>
							<div class="work">
								<p>Гражданство</p>
								<div class="styled-select styled-select2">
									<select name="grajd">
										<option>Любое</option>
									</select>
								</div>
							</div>
							<div class="work">
								<p>Знание языков</p>
								<div class="styled-select styled-select2">
									<select name="lang">
										<option>Любых</option>
									</select>
								</div>
							</div>
							<div id="options2">
								<p>Зарплата, руб.</p>
								<label class="m-l" for="price">от:
									<input type="text" name="price" id="price">
								</label>
								
								<label for="price2">до:
									<input type="text" name="price2" id="price2">
								</label>
								<div id="slider_price2"></div>
							</div>
							<div class="sex">
								<p>
									<label><input type="radio" name="c" value="chas" /><span></span></label>
									<span>В час</span>
								</p>
								<p class="last">
									<label><input type="radio" name="c" value="mes" /><span></span></label>
									<span>В месяц</span>
								</p>
							</div>
							<div class="clear"></div>
							<div class="work">
								<p>Режим работы</p>
								<div class="styled-select styled-select2">
									<select name="rejim">
										<option>Любой</option>
									</select>
								</div>
							</div>
							<div class="work dop">
								<p>Опыт работы</p>
								<div class="styled-select styled-select2">
									<select name="rejim">
										<option>Любой</option>
									</select>
								</div>
							</div>
							<div class="check dop">
								<p class="title">Опыт ухода за детьми возрастных групп</p>
								<p>
									<label><input type="checkbox" name="check" value="1" /><span></span></label>
									<span>новорожденный - 3 месяца</span>
								</p>
								<p>
									<label><input type="checkbox" name="check" value="2" /><span></span></label>
									<span>от 3 до 12 месяцев</span>
								</p>
								<p>
									<label><input type="checkbox" name="check" value="3" /><span></span></label>
									<span>от 1 до 2 года</span>
								</p>
								<p>
									<label><input type="checkbox" name="check" value="4" /><span></span></label>
									<span>от 2 до 5 лет</span>
								</p>
								<p>
									<label><input type="checkbox" name="check" value="5" /><span></span></label>
									<span>от 5 до 10 лет</span>
								</p>
							</div>
							<div class="work dop">
								<p>Количество детей для ухода</p>
								<div class="styled-select styled-select2">
									<select name="count">
										<option>Любое</option>
									</select>
								</div>
							</div>
							<div class="check dop">
								<p>
									<label><input type="checkbox" name="check" value="6" /><span></span></label>
									<span>Готовность ухаживать за детьми, которые требуют особого ухода по медицинским и/или иным показателям</span>
								</p>
							</div>
							<div class="check bb">
								<p class="title">Дополнительные требования</p>
								<p class="dop">
									<label><input type="checkbox" name="check" value="7" /><span></span></label>
									<span>Работа за рубежом</span>
								</p>
								<p class="dop">
									<label><input type="checkbox" name="check" value="8" /><span></span></label>
									<span>Отсутствие аллергии и стресса к домашним животным</span>
								</p>
								<p class="dop">
									<label><input type="checkbox" name="check" value="9" /><span></span></label>
									<span>Некурящий(ая)</span>
								</p>
								<p class="dop">
									<label><input type="checkbox" name="check" value="10" /><span></span></label>
									<span>Наличие автотранспорта</span>
								</p>
								<p class="dop">
									<label><input type="checkbox" name="check" value="11" /><span></span></label>
									<span>Готовность приступить к работе в кратчайшие сроки</span>
								</p>
								<p>
									<label><input type="checkbox" name="check" value="12" /><span></span></label>
									<span>Скрыть в результатах поиска резюме агентств</span>
								</p>
							</div>
							<div class="button">
								<input type="button" name="send" value="Применить" />
								<p><a onclick="return false" href="#">Показать все фильтры</a></p>
							</div>
						</form>
					</div>
					<div class="agent-rezume">
						<div class="rezume-block">
							<div class="block-img-right block-img-last">
								<div class="contacts-vacansy">
									<p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
									<a href="#">Няня-гувернантка к мальчику 5-ти лет</a>
									<p class="info-contact info-contact-bold">Контактное лицо: <span>Ольга Александровна</span></p>
								</div>
								<div class="information">
									<p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
									<div class="experience">
										<div class="left">
											<p>Опыт работы няней: <span>– 6 лет</span></p>
											<p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
										</div>
										<div class="right">
											<p>Отношение к курению: <span>– не курю</span></p>
											<p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
										</div>	
									</div>
								</div>
								<a class="works" name="modal" href="#dialog6"><span>Москва, м. Водный стадион, ул. Авангардная</span></a>
								<p class="price-vacansy">Стоимость оказания услуг: <span>250 - 400 руб / час</span></p>
								<p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
								<div class="buts">
									<a class="buttons" href="#">Смотреть полностью</a>
									<a class="favorites" onclick="return false" href="#">Добавить в избранное</a>
								</div>
							</div>
						</div>
						
						<div class="rezume-block">
							<div class="block-img-right block-img-last">
								<div class="contacts-vacansy">
									<p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
									<a href="#">Няна для мальчика 9-ти лет</a>
									<p class="info-contact info-contact-bold">Контактное лицо: <span>Анна Владимировна</span></p>
								</div>
								<div class="information">
									<p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
									<div class="experience">
										<div class="left">
											<p>Опыт работы няней: <span>– 6 лет</span></p>
											<p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
										</div>
										<div class="right">
											<p>Отношение к курению: <span>– не курю</span></p>
											<p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
										</div>	
									</div>
								</div>
								<a class="works" name="modal" href="#dialog5"><span>Москва, Сходненская</span></a>
								<p class="price-vacansy">Стоимость оказания услуг: <span>150 - 350 руб / час</span></p>
								<p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
								<div class="buts">
									<a class="buttons" href="#">Смотреть полностью</a>
									<a class="favorites" onclick="return false" href="#">Добавить в избранное</a>
								</div>
							</div>
						</div>
						
						<div class="rezume-block">
							<div class="block-img-right block-img-last">
								<div class="contacts-vacansy">
									<p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
									<a href="#">Няня-гувернантка к мальчику 5-ти лет</a>
									<p class="info-contact info-contact-bold">Контактное лицо: <span>Ольга Александровна</span></p>
								</div>
								<div class="information">
									<p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
									<div class="experience">
										<div class="left">
											<p>Опыт работы няней: <span>– 6 лет</span></p>
											<p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
										</div>
										<div class="right">
											<p>Отношение к курению: <span>– не курю</span></p>
											<p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
										</div>	
									</div>
								</div>
								<a class="works" name="modal" href="#dialog5"><span>Москва, м. Водный стадион, ул. Авангардная</span></a>
								<p class="price-vacansy">Стоимость оказания услуг: <span>250 - 400 руб / час</span></p>
								<p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
								<div class="buts">
									<a class="buttons" href="#">Смотреть полностью</a>
									<a class="favorites" onclick="return false" href="#">Добавить в избранное</a>
								</div>
							</div>
						</div>
						
						<div class="rezume-block">
							<div class="block-img-right block-img-last">
								<div class="contacts-vacansy">
									<p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
									<a href="#">Няна для мальчика 9-ти лет</a>
									<p class="info-contact info-contact-bold">Контактное лицо: <span>Анна Владимировна</span></p>
								</div>
								<div class="information">
									<p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
									<div class="experience">
										<div class="left">
											<p>Опыт работы няней: <span>– 6 лет</span></p>
											<p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
										</div>
										<div class="right">
											<p>Отношение к курению: <span>– не курю</span></p>
											<p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
										</div>	
									</div>
								</div>
								<a class="works" name="modal" href="#dialog5"><span>Москва, Сходненская</span></a>
								<p class="price-vacansy">Стоимость оказания услуг: <span>150 - 350 руб / час</span></p>
								<p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
								<div class="buts">
									<a class="buttons" href="#">Смотреть полностью</a>
									<a class="favorites" onclick="return false" href="#">Добавить в избранное</a>
								</div>
							</div>
						</div>		
						
						<div class="rezume-block">
							<div class="block-img-right block-img-last">
								<div class="contacts-vacansy">
									<p class="title">Резюме предоставлено Кадровым агентством <a href="#">«Best-consult»</a></p>
									<a href="#">Няна для мальчика 9-ти лет</a>
									<p class="info-contact info-contact-bold">Контактное лицо: <span>Анна Владимировна</span></p>
								</div>
								<div class="information">
									<p>Ищем ответственную, порядочную, воспитанную, аккуратную и доброжелательную женщину/девушку для присмотра за ребенком 1, 3 года. Необходимо 2-3 раза в неделю находиться по полдня. График обговаривается совместно. Воз... <a href="#">посмотреть полностью</a></p>
									<div class="experience">
										<div class="left">
											<p>Опыт работы няней: <span>– 6 лет</span></p>
											<p>Опыт работы няней с детьми следующих возростных групп: <span>– от 1 месяца до 12 лет</span></p>
										</div>
										<div class="right">
											<p>Отношение к курению: <span>– не курю</span></p>
											<p>Предпочитаемый Режим работы: <span>– постоянный (от 6 часов в день);</span></p>
										</div>	
									</div>
								</div>
								<a class="works" name="modal" href="#dialog7"><span>Москва, Сходненская</span></a>
								<p class="price-vacansy">Стоимость оказания услуг: <span>150 - 350 руб / час</span></p>
								<p class="start-vacansy">Готовность приступить в кратчайшее сроки</p>
								<div class="buts">
									<a class="buttons" href="#">Смотреть полностью</a>
									<a class="favorites" onclick="return false" href="#">Добавить в избранное</a>
								</div>
							</div>
						</div>
						
						<div class="pagination">
							<ul>
								<li>
									<a href="#"></a>
								</li>
								<li>
									<a href="#">2</a>
								</li>
								<li>
									<a href="#">3</a>
								</li>
								<li>
									<a href="#">4</a>
								</li>
								<li>
									<a href="#"></a>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- Конец Контента -->
		
		<!-- Подвал -->
		<div class="footer">
			<div class="wrap">
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