<?php
date_default_timezone_set("Europe/Moscow");
setlocale(LC_ALL, 'ru_RU');

R::setup('mysql:host=localhost;dbname=news',
    'root', '');

if (!R::testConnection()) {
    echo 'Нет подключения к БД';
    die('No DB connection!');
}