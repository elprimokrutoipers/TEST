<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

// Проверяем, была ли отправлена форма
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Получаем данные из формы
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Проверяем данные пользователя
    $user = check_user_credentials($email, $password);
    try {
        if ($user['роль'] == 'Администратор') {
            // Если пользователь - администратор, перенаправляем на страницу администратора
            header('Location: admin/admin_page.php');
        } elseif ($user['роль'] == 'Учитель') {
            // Если пользователь - учитель, перенаправляем на страницу учителя
            header('Location: teacher/teacher_page.php');
        } elseif ($user['роль'] == 'Ученик') {
            // Если пользователь - ученик, перенаправляем на страницу ученика
            header('Location: student/student_page.php');
        } elseif ($user['роль'] == 'Родитель') {
            // Если пользователь - родитель, перенаправляем на страницу родителя
            header('Location: parent/parent_page.php');
        } else {
            // Если роль не определена, бросаем исключение
            throw new Exception("Ошиба авторизации");
        }
    } catch (Exception $e) {
        // Обрабатываем исключение и перенаправляем на страницу авторизации
        header('Location: autorization.php');
    }
}
