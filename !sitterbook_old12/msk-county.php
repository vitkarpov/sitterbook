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
		<!--
<meta name="viewport" content="width=1150"/>
		<link rel="stylesheet" href="css/iphone.css" type="text/css" />
-->
	<?php
	} ?>
    
    <!-- Стили -->
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="stylesheet" href="fonts.css" type="text/css" />
	<link rel="stylesheet" href="css/mobile-style.css" type="text/css" />
	<link rel="stylesheet" href="css/jquery-ui.css"/>
	<link rel="stylesheet" href="css/croppic.css" type="text/css"/>
    <!--
<link rel="stylesheet" href="css/select.css" />
-->

	
    <!-- Javascripts -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/datepicker-ru.js"></script>
    <script type="text/javascript" src="js/croppic.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>

	<script type="text/javascript" src="js/polz.js"></script>
	<script type="text/javascript" src="js/raphael.js"></script>
	<script type="text/javascript" src="js/path.js"></script>
    
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
    <!-- Календарь -->
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
    
     <!-- Города и округа -->
     <script type="text/javascript">
     $(document).ready(function(){
            
            $(".green-btn").click(
                function(){
                $(this).parent(".all-city").hide("fast");
                })
            });
         
     $(document).on("click", ".add-city", function(){
                
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
					<h1>Округи МСК</h1>
                    <!-- Начало формы -->
                    <form action="" method="" id="">
					<div class="work-map">
						<p class="title-border">Тест округов МСК</p>
						<div class="select-city">
							<p class="mb">Выберите округ Москвы</p>
							<div class="wrap-sel">
							<div class="show-counties">
                                <p><a name="modal" href="#dialog11">ЦАО</a></p>
                                <p><a name="modal" href="#dialog12">НАО</a></p>
                                <p><a name="modal" href="#dialog6">САО</a></p>
                                <p><a name="modal" href="#dialog5">СВАО</a></p>
                                <p><a name="modal" href="#dialog7">СЗАО</a></p>
                                <p><a name="modal" href="#dialog13">ТАО</a></p>
                                <p><a name="modal" href="#dialog14">UAO</a></p>
                                <p><a name="modal" href="#dialog15">UVAO</a></p>
                                <p><a name="modal" href="#dialog16">Зелао</a></p>
                                <p><a name="modal" href="#dialog17">ЗАО</a></p>
                                <p><a name="modal" href="#dialog18">ВАО</a></p>
                                <p><a name="modal" href="#dialog19">ЮЗАО</a></p>
							</div>
                                <!--Карта Питер-->
                                <div class="count-sel-and-map count-sel-and-map2" id="spb">
    								<span>Выбрано 2 района</span>
    								<p><a name="modal" href="#dialog10">Выбрать районы на карте</a></p>
    							</div>
                                <!--Округи и карта МСК-->
                                <div class="county-maps" id="parent-map">
                                    	<div class="sel seld-old">
								<span class="seld-old-title">Округ</span>
								<div class="all-city">
									<p>Выберите округ/а</p>
									
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												Все округа
											</span>
										</div>
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												СЗАО
											</span>
										</div>
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												САО
											</span>
										</div>
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												СВАО
											</span>
										</div>
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												ЗАО
											</span>
										</div>
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												ЦАО
											</span>
										</div>
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												ВАО
											</span>
										</div>		
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												ЮЗАО
											</span>
										</div>	
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												ЮАО
											</span>
										</div>	
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												ЮВАО
											</span>
										</div>	
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												ЗелАО
											</span>
										</div>	
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												НАО
											</span>
										</div>
										
										<div class="checkbox">
											<label>
												<input class="ch" type="checkbox" name="test" value="yes"/>
												<span></span>
											</label>
											<span class="lab">
												ТАО
											</span>
										</div>

									<div class="green-btn">Ок</div>
								</div>
							</div>
                                    <div class="count-sel-and-map">
        								<span>Выбрано 11 районов</span>
        								<p><a name="modal" href="#dialog9" href="#">Выбрать округа и районы на карте</a></p>
        							</div>
                                </div> 
                                <div class="clear"></div>         
							</div>
							<div class="clear"></div>
                            <!--Добавить город-->
                            
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
									<input type="text" name="birthday" id="datepicker" class="blured cal" placeholder="25 ноября 1983" value=""/>
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
								<div id="cropContaineroutput" style="">
								
								</div>
								<!--
<a href="#">
									<img src="img/add-photos.png" alt="" />
								</a>
-->
							</div>
							<div class="info" id="nota">
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
        <!-- Модальное окно СВАО -->
      
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
                            <p><a href="#">Округа и районы / ЦАО</a></p>
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
    <script type="text/javascript">
		var croppicContaineroutputOptions = {
				uploadUrl:'img_save_to_file.php',
				cropUrl:'img_crop_to_file.php', 
				outputUrlId:'cropOutput',
				modal:false,
   	            doubleZoomControls:false,
			    rotateControls: false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
		}
		var cropContaineroutput = new Croppic('cropContaineroutput', croppicContaineroutputOptions);
    </script>
</body>
</html>