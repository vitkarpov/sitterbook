<?php

//=========================//
// Вспомогательные функции //
//=========================//

// Подключение/отключение от БД

$mysqli = false;

function connectDB() {
    global $mysqli;

    $mysqli = new mysqli(
        "localhost",
        "user24561_sandus",
        "K9Y73j9tFYx1j",
        "user24561_sitterbook"
    );

    $mysqli->set_charset('utf8');
}

function closeDB() {
    global $mysqli;
    $mysqli->close();
}

// Вывод массива из SQL-запроса
function resultSetToArray($result_set) {
    $array = array();

    while(($row = $result_set->fetch_assoc()) != false) {
        $array[] = $row;
    }

    return $array;
}



//=========//
// Запросы //
//=========//

// Выбрать все города
function allCities() {
    global $mysqli;
    connectDB();

    $result_set = $mysqli->query("
        SELECT * FROM `cities`
        WHERE `parent_city` = '0'
        ORDER BY `id_city` ASC
    ");

    closeDB();
    return resultSetToArray($result_set);
}

// Проверить, существует ли карта выбранного города
function foundCity($option) {
    global $mysqli;
    connectDB();

    $result_set = $mysqli->query("
        SELECT * FROM `cities`
        WHERE `id_city` = $option AND `parent_city` = '0'
    ");

    closeDB();
    return resultSetToArray($result_set);
}


// Проверить, существует ли карта выбранного округа
function foundOtherCity($option) {
    global $mysqli;
    connectDB();

    $result_set = $mysqli->query("
        SELECT * FROM `cities`
        WHERE `parent_city`='$option'
    ");

    closeDB();
    return resultSetToArray($result_set);
}

// Выбрать округа по id города
function getCounties($option) {
    global $mysqli;
    connectDB();

    $option = $mysqli->real_escape_string($option);
    $result_set = $mysqli->query("
        SELECT * FROM `counties`
        WHERE `parent_city`='$option' AND `parent_id`='0'
        ORDER BY `id_county` ASC
    ");

    closeDB();
    return resultSetToArray($result_set);
}

// Выборка городов с картами
function getCitiesMap() {
    global $mysqli;
    connectDB();

    $result_set = $mysqli->query("
        SELECT * FROM `cities`
        WHERE NOT(`map` = ' ')
    ");

    closeDB();
    return resultSetToArray($result_set); 
}

// Выборка округов с картами
function getCountiesMap() {
    global $mysqli;
    connectDB();

    $result_set = $mysqli->query("
        SELECT * FROM `counties`
        WHERE NOT(`map` = ' ')
    ");

    closeDB();
    return resultSetToArray($result_set);
}

?>