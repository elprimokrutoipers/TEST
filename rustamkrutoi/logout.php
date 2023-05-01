<?php
session_start();

//Удаляем информацию о пользователе из сессии
unset($_SESSION['']);

//Перенаправляем пользователя на главную страницу
header('Location: main_page.php');