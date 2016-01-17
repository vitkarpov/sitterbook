<?php

include_once "../libs/start.php";


if( isset($_POST['get_option']) ) {
	$option = addslashes(htmlspecialchars(trim($_POST['get_option'])));
	$counties = getCounties($option);
	$map_found = foundCity($option);

	if($option === "1") {
		echo "<div class='sel seld-old'>
						<span class='sel seld-old-title'>Округа</span>

						<div class='all-city'>
							<p>Выберите округ(а)</p>

							<div class='checkbox all'>
								<label>
									<input class='ch' type='checkbox' value='all'>
									<span class='checkbox_box'></span>
									<span class='lab'>Все округа</span>
								</label>
							</div>";
	}

	for ($i = 0; $i < count($counties); $i++) {
		$id_county = $counties[$i]['id_county'];
		$county_name = $counties[$i]['county_name'];
		$map = $counties[$i]['map'];
		$yandex = $counties[$i]['yandex'];

		echo "		<div class='checkbox'>
								<label>
									<input class='ch' type='checkbox' name='test' id='$id_county' value='$county_name'>
									<span class='checkbox_box'></span>
									<span class='lab'>$county_name</span>
								</label>
							</div>";
	}

	if($option === "1") {
		echo			"<div class='btn-rounded'>Ок</div>
						</div>
					</div>";
	}

	// Проверяем есть ли карта у города
	for($i = 0; $i < count($map_found); $i++) {
		$id_map = $map_found[$i]['id_city'];
		$map = $map_found[$i]['map'];
		$yandex = $map_found[$i]['yandex'];

		if($map != '') {
			echo "<div class='count-sel-and-map'>
							<span>Выбрано районов: <strong>0</strong></span>

							<p>
								<a name='modal' href='#dialog$option'>
									Выбрать округа и районы на карте
								</a>
							</p>
						</div>";
		} else {
			echo "<div class='count-sel-and-map'>
							<p>
								<a name='yandex' href='#yandex$option'>
									Показать на карте
								</a>
							</p>
						</div>";
		}
	}
}

?>
