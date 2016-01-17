<?php

include_once "../libs/start.php";

$cities = allCities();

for ( $i=0; $i<count($cities); $i++ ) {
	$id_city = $cities[$i]['id_city'];
	$city_name = $cities[$i]['city_name'];
	$map = $cities[$i]['map'];
	$yandex = $cities[$i]['yandex'];
	echo "<option value=\"$id_city\">$city_name</option>";
}

?>