<?php

// Подключение к сессиям
session_start();
// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/db.php';
require_once __DIR__ . '/autoload.php';


require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор

//require_once __DIR__ . '/autoload.php';