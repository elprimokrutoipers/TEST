<?php
// Настройки подключения к базе данных
// Настройки подключения к базе данных
$pdo_host = 'localhost';
$pdo_user = 'root';
$pdo_password = '';
$pdo_name = 'event_management_system';

// Подключаемся к базе данных
try {
    $pdo = new PDO("mysql:host=$pdo_host;dbname=$pdo_name", $pdo_user, $pdo_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Запускаем сессию
session_start();
?>