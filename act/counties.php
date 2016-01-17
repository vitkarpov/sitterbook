<?php

include_once "../libs/start.php";

if(isset($_POST['get_option'])) {
	$option = addslashes(htmlspecialchars(trim($_POST['get_option'])));
	$counties = getCounties($option);

	for( $i = 0; $i < count($counties); $i++ ) {
		$id_county = $counties[$i]['id_county'];
		$county_name = $counties[$i]['county_name'];
		$map = $counties[$i]['map'];
		$yandex = $counties[$i]['yandex'];

		echo "<div class='checkbox'>
						<label>
							<input class='ch' type='checkbox' name='test' id='$id_county' value='$county_name'>
							<span></span>
						</label>

						<span class='lab'>$county_name</span>
					</div>";
	}
}

?>