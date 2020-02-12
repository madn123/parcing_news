<?php
require_once('vendor/phpQuery/phpQuery.php');
require_once('vendor/rb.php');
require_once('vendor/autoload.php');
require_once('functions.php');

date_default_timezone_set("Europe/Moscow");
setlocale(LC_ALL, 'ru_RU');

R::setup('mysql:host=localhost;dbname=news',
    'root', '');

if (!R::testConnection()) {
    echo 'Нет подключения к БД';
    die('No DB connection!');
}