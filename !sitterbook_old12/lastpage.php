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
		<meta name="viewport" content="width=1150">
		<link rel="stylesheet" href="iphone.css" type="text/css" />
	<?php
	} ?>
	
    <!-- Стили -->
	<link rel="stylesheet" href="fonts.css" type="text/css" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="stylesheet" href="css/mobile-style.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui-1.8.19.custom.css"/>
    
    <!-- Javascripts -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/polz.js"></script>
    <script type="text/javascript"  src="js/modal.js"></script>
	
	<script src="js/raphael.js" type="text/javascript"></script>
	<script src="js/path.js" type="text/javascript"></script>
	
    <!-- Подгрузка городов/округов/районов -->
	<script type="text/javascript" src="js/moscow.js"></script>
	<script type="text/javascript" src="js/spb.js"></script>
    <script type="text/javascript" src="js/county/sao.js"></script>
    <script type="text/javascript" src="js/county/nao.js"></script>
    <script type="text/javascript" src="js/county/caos.js"></script>
    <script type="text/javascript" src="js/county/svao2.js"></script>
    <script type="text/javascript" src="js/county/szao.js"></script>
    <script type="text/javascript" src="js/county/tao.js"></script>
    <script type="text/javascript" src="js/county/uao.js"></script>
    <script type="text/javascript" src="js/county/uvao.js"></script>
    <script type="text/javascript" src="js/county/uzao.js"></script>
    <script type="text/javascript" src="js/county/zelao.js"></script>
    <script type="text/javascript" src="js/county/zao.js"></script>
    <script type="text/javascript" src="js/county/vao.js"></script>
    
    
    <!-- Города и округа -->
    <script type="text/javascript">
    //Удаление выбранных элементов
        $(document).on("click", ".block-goroda span", function() {
        	$(this).remove();
        })
        
        $(document).on("click", ".clear", function() {
		  $(this).parent().prevAll().eq(2).find('span').remove();
        }) 
        
         $(document).on("click", ".addcity", function() {
                $(".workadd .addcity").before("<div class='work-layout'><div class='work'><div class='styled-select styled-select2'><select name='grajd' class='city'> <option disabled='disabled' selected='selected'>Город</option> <optgroup label='Выберите город'> <option value='1'>Москва</option> <option value='2'>Санкт-Петербург</option> <optgroup label='Московская область'> <option value='3'>Апрелевка</option> <option value='4'>Балашиха</option> <option value='5'>Бронницы</option> <option value='6'>Верея</option> <option value='7'>Видное</option> <option value='8'>Волоколамск</option> <option value='9'>Воскресенск</option> <option value='10'>Высоковск</option> <option value='11'>Дедовск</option> <option value='12'>Дзержинский</option> <option value='13'>Дмитров</option> <option value='14'>Долгопрудный</option> <option value='15'>Дрезна</option> <option value='16'>Домодедово</option> <option value='17'>Дубна</option> <option value='18'>Егорьевск</option> <option value='18'>Железнодорожный</option> <option value='19'>Жуковский</option> <option value='20'>Зарайск</option> <option value='21'>Зеленоград</option> </select> </div> </div> <!-- Районы СПБ --> <div class='gorod hidden-class'>	<div class='work marg'> <div class='sel'> <span>Район</span> <div class='all-city'> <p>Выберите район/ы</p> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Все районы </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Адмиралтейский </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Василеостровский </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Выборгский </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Калининский </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Кировский </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Колпинский </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Красногвардейский </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Красносельский </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Кронштадтский </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Курортный </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Московский </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Невский </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Петроградский </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Петродворцовый </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Приморский </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Пушкинский </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Фрунзенский </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> Центральный </span> </div> <div class='green-btn'>Ок</div> </div> </div> </div> <p class='gorod-okrug'>Районы</p> <div class='block-goroda'> <span>Выборгский X</span> <span>Пушкинский X</span> <span>Кронштадский X</span> </div> <p class='select'>Выбрано 11 районов</p> <div class='iconmap'><a class='addokrug' name='modal' href='#dialog10'>Выбрать районы на карте</a></div> <div><a class='clear' href='javascript:void(0)'>Очистить</a></div> </div> <!-- Округи Москвы --> <div class='gorod first hidden-class' id='parent-map'> <div class='work marg'> <div class='sel'> <span>Округ</span> <div class='all-city'> <p>Выберите округ/а</p> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'/> <span></span> </label> <span class='lab'> Все округа </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'/> <span></span> </label> <span class='lab'> СЗАО </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'/> <span></span> </label> <span class='lab'> САО </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'/> <span></span> </label> <span class='lab'> СВАО </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'/> <span></span> </label> <span class='lab'> ЗАО </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'/> <span></span> </label> <span class='lab'> ЦАО </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'/> <span></span> </label> <span class='lab'> ВАО </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'/> <span></span> </label> <span class='lab'> ЮЗАО </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> ЮАО </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> ЮВАО </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> ЗелАО </span> </div>	<div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> НАО </span> </div> <div class='checkbox'> <label> <input class='ch' type='checkbox' name='test' value='yes'> <span></span> </label> <span class='lab'> ТАО </span> </div> <div class='green-btn'>Ок</div> </div> </div> </div> <p class='gorod-okrug'>Округа</p> <div class='block-goroda'> <span>СЗАО X</span> <span>ЮЗАО X</span> <span>ЮЗАО X</span> <span>ЮЗАО X</span> </div> <p class='select'>Выбрано 11 районов</p> <div class='iconmap'><a name='modal' href='#dialog9' class='addokrug'>Выбрать округа и районы на карте</a></div> <div><a class='clear' href='javascript:void(0)'>Очистить</a></div></div></div><div class='clear'></div>"); 
                openModal();
                });
                
       	$(document).on("click", ".addcity", function(){
            $(".city").parent().parent(".work").change(
                function(){
                var valOpt=$(this).find('option:selected').val();
                if(valOpt=="1")$(this).next().next(".gorod").show("fast");
                else  $(this).next().next(".gorod").hide("fast")
                });

                
            $(".city").parent().parent(".work").change(
                function(){
                var valOpt=$(this).find('option:selected').val();
                if(valOpt=="2")$(this).next(".hidden-class").show("fast");
                else  $(this).next(".hidden-class").hide("fast")
                });
                
                
            $(".green-btn").click(
                function(){
                $(this).parent(".all-city").hide("fast");
                })
            });
           
           
        $(document).on("click", ".work .sel", function() {
		 
			$(".all-city", this).css({
				display: "block"
			});
		 });
                
        $(document).ready(function(){
            $("#parent-city").change(
                function(){
                var valOpt=$(this).find('option:selected').val();
                if(valOpt=="1")$("#parent-map").show("fast");
                else  $("#parent-map").hide("fast")
                });
                
            $("#parent-city").change(
                function(){
                var valOpt=$(this).find('option:selected').val();
                if(valOpt=="2")$("#spb").show("fast");
                else  $("#spb").hide("fast")
                });
            
            $(".green-btn").click(
                function(){
                $(this).parent(".all-city").hide("fast");
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
                                <!-- Список Городов -->
                                	
                                 <div class="clear"></div>	
                                 <!--Добавить город-->
							<a class="addcity" href="#">+ Добавить город</a>							
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
		<!-- Модальное окно СВАО -->
      <div id="boxes5">
			<div id="dialog5" class="window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />СВАО</p>
                                <div class="wrap-check">
                                    <!-- Форма карты -->
    								<div class="wrap-check svao-city">
    								     <!-- Выводим сюда карту СВАО -->
                                         <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
    								</div>
                                    <button class="green-btn do-close">Ок</button>
                                </div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
                            <p><a href="#">Округа и районы / СВАО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMapPiter" id="map5"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Модальное окно САО -->
        <div id="boxes6">
			<div id="dialog6" class="window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />САО</p>
                                <div class="wrap-check">
                                    <!-- Форма карты -->
    								<div class="wrap-check caos-city">
    								     <!-- Выводим сюда карту САО -->
                                         <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
    								</div>
                                    <button class="green-btn do-close">Ок</button>
                                </div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
                            <p><a href="#">Округа и районы / САО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMapPiter" id="map6"></div>
					</div>
				</div>
			</div>
		</div>
        
        <!-- Модальное окно СЗАО -->
        	<div id="boxes7">
			<div id="dialog7" class="window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />СЗАО</p>
								<div class="wrap-check">
								    <!-- Форма карты -->
									<div class="wrap-check szao-city">
                                        <!-- Выводим сюда карту СЗАО-->
                                        <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button class="green-btn do-close">Ок</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map">
						<div class="bl">
							<p><a href="#">Округа и районы / СЗАО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMap" id="map7"></div>
					</div>
				</div>
			</div>
		</div>
        	
		
        <!-- Модальное окно МСК -->
        	<div id="boxes9">
			<div id="dialog9" class="window">
				<a href="#" class="link close"/>X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите округ/а<br />и районы Москвы</p>
								<div class="wrap-check">
								    <!-- Форма карты -->
									<div class="wrap-check moscow-city">
                                        <!-- Выводим сюда карту МСК -->
                                        
                                        <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button class="green-btn do-close">Ок</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map">
						<div class="bl">
							<p><a href="#">Округа и районы</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMap" id="map4"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно 10 Питер -->
		<div id="boxes10">
			<div id="dialog10" class="window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />Санкт-Петербург</p>
                                <div class="wrap-check">
                                    <!-- Форма карты -->
    								<div class="wrap-check spb-city">
    								     <!-- Выводим сюда карту СПБ -->
                                         <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
    								</div>
                                    <button class="green-btn do-close">Ок</button>
                                </div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
                            <p><a href="#">Округа и районы / Санкт-Петербург</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMapPiter" id="map3"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно ЦАО -->
        	<div id="boxes11">
			<div id="dialog11" class="window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />ЦАО</p>
                                <div class="wrap-check">
                                    <!-- Форма карты -->
    								<div class="wrap-check sao-city">
    								     <!-- Выводим сюда карту ЦАО -->
                                         <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
    								</div>
                                    <button class="green-btn do-close">Ок</button>
                                </div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMapPiter" id="map11"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно НАО -->
        <div id="boxes12">
			<div id="dialog12" class="window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />НАО</p>
                                <div class="wrap-check">
                                    <!-- Форма карты -->
    								<div class="wrap-check nao-city">
    								     <!-- Выводим сюда карту НАО -->
                                         <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
    								</div>
                                    <button class="green-btn do-close">Ок</button>
                                </div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
     	                  <p><a href="#">Округа и районы / НАО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMapPiter" id="map12"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно ТАО -->
        	<div id="boxes13">
			<div id="dialog13" class="window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />ТАО</p>
								<div class="wrap-check">
								    <!-- Форма карты -->
									<div class="wrap-check tao-city">
                                        <!-- Выводим сюда карту ТАО-->
                                        <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button class="green-btn do-close">Ок</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
							<p><a href="#">Округа и районы / ТАО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMap" id="map13"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно УАО -->
        <div id="boxes14" class="boxes-all">
			<div id="dialog14" class="dialog-all window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />УАО</p>
								<div class="wrap-check">
								    <!-- Форма карты -->
									<div class="wrap-check uao-city">
                                        <!-- Выводим сюда карту УАО-->
                                        <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button class="green-btn do-close">Ок</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
							<p><a href="#">Округа и районы / УАО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMap" id="map14"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно УВАО -->
        <div id="boxes15" class="boxes-all">
			<div id="dialog15" class="dialog-all window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />УВАО</p>
								<div class="wrap-check">
								    <!-- Форма карты -->
									<div class="wrap-check uvao-city">
                                        <!-- Выводим сюда карту УВАО-->
                                        <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button class="green-btn do-close">Ок</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
							<p><a href="#">Округа и районы / УВАО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMap" id="map15"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно Зелао -->
        <div id="boxes16" class="boxes-all">
			<div id="dialog16" class="dialog-all window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />Зелао</p>
								<div class="wrap-check">
								    <!-- Форма карты -->
									<div class="wrap-check zelao-city">
                                        <!-- Выводим сюда карту Зелао-->
                                        <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button class="green-btn do-close">Ок</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
							<p><a href="#">Округа и районы / Зелао</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMap" id="map16"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно ЗАО -->
        <div id="boxes17" class="boxes-all">
			<div id="dialog17" class="dialog-all window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />ЗАО</p>
								<div class="wrap-check">
								    <!-- Форма карты -->
									<div class="wrap-check zao-city">
                                        <!-- Выводим сюда карту ЗАО-->
                                        <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>

                                        </div>
                                    </div>
                                    <button class="green-btn do-close">Ок</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
							<p><a href="#">Округа и районы / ЗАО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMap" id="map17"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно ВАО -->
        <div id="boxes18" class="boxes-all">
			<div id="dialog18" class="dialog-all window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />ВАО</p>
								<div class="wrap-check">
								    <!-- Форма карты -->
									<div class="wrap-check vao-city">
                                        <!-- Выводим сюда карту ВАО-->
                                        <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button class="green-btn do-close">Ок</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
							<p><a href="#">Округа и районы / ВАО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMap" id="map18"></div>
					</div>
				</div>
			</div>
		</div>
        <!-- Модальное окно ЮЗАО -->
        <div id="boxes19" class="boxes-all">
			<div id="dialog19" class="dialog-all window">
				<a href="#" class="link close">X</a>
				<div class="wrapper mapped">
					<p class="title-info-vacansy title-info-vacansy2">Выберите желаемое/возможное<br />территориальное расположение места работы</p>
					<div class="clear"></div>
					<div class="citys citys2 citys3">
						<div class="work">
							<div class="block-sel block-sel2">	
								<p>Выберите районы<br />ЮЗАО</p>
								<div class="wrap-check">
								    <!-- Форма карты -->
									<div class="wrap-check uzao-city">
                                        <!-- Выводим сюда карту ЮЗАО-->
                                        <div class="parent-check">
                                            <p><label><input type="checkbox" name="all-checkbox" value="checkbox"/><span></span></label>
                                            <span class="lab">Все</span>
                                            </p>
                                        </div>
                                    </div>
                                    <button class="green-btn do-close">Ок</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-map right-map2">
						<div class="bl">
							<p><a href="#">Округа и районы / ЮЗАО</a></p>
							<p class="ya"><a href="#">Сориентируйся на карте</a></p>
						</div>
						<div class="marginMap" id="map19"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="mask"></div>
	</div>
</body>
</html>