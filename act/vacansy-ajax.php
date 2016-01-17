<?php
    include_once "../libs/start.php";

    if(isset($_POST['get_option'])){
    $option=addslashes(htmlspecialchars(trim($_POST['get_option'])));
    $counties=getCounties($option);
    $map_found=foundCity($option);
    $region=foundOtherCity($option);
    
    //Проверяем есть ли карта у города
    for($i=0; $i<count($map_found);$i++){ 
        $id_map = $map_found[$i]['id_city'];
        $map = $map_found[$i]['map'];  
        $yandex = $map_found[$i]['yandex']; 
        if(empty($map)){
            echo "<div class=\"dop-input\">
					<div class=\"inp\">
						<p class=\"title\">Индекс:</p>
						<input class=\"blured\" type=\"text\" name=\"index\" value=\"123456\">
					</div>
					<div class=\"inp inp2\">
						<p class=\"title\">Улица:</p>
						<input class=\"blured\" type=\"text\" name=\"index\" value=\"Название улицы\">
					</div>
                    <div class=\"clear\"></div>
				</div><div class=\"clear\"></div>";
        }
        
        else if($id_map==="1"){
            echo "<div class=\"create-mb mb-county\"><p class=\"mb\">Округ: <span>*</span></p>
                    <div class=\"sel seld-title\">
                    <select name=\"county\" class=\"city\" id=\"parent-county\">
                    <option disabled=\"disabled\" selected=\"selected\">Выберите округ</option>";
                    for($i=0; $i<count($counties);$i++){
                        $id_county = $counties[$i]['id_county'];    
                        $county_name = $counties[$i]['county_name'];    
                        echo "<option value=\"$id_county\">$county_name</option>";
                        }
            
            echo "</div></div>";
        }
        
        else{
            echo "<div class=\"create-mb mb-region\"><p class=\"mb\">Район: <span>*</span></p>
                    <div class=\"sel seld-title\">
                    <select name=\"region\" class=\"city\" id=\"parent-region\">
                    <option disabled=\"disabled\" selected=\"selected\">Выберите район</option>";
                    for($i=0; $i<count($region);$i++){
                        $id_city = $region[$i]['id_city'];    
                        $city_name = $region[$i]['city_name'];   
                        print "<option value=\"$id_city\">$city_name</option>";
                        }
            echo "</div></div>";
        }
        }
    }
?>