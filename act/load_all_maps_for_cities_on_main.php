<?php
  $cmap = getCitiesMap();

  for( $i = 0; $i < count($cmap); $i++ ) {
    $id = $cmap[$i]['id_city'];
    $name = $cmap[$i]['city_name'];
    $map = $cmap[$i]['map'];
    $yandex = $cmap[$i]['yandex'];
    $url = $cmap[$i]['url'];
    include "intro_counties.php";
  }
?>