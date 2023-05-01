<?php
// Функция для проверки данных пользователя при авторизации
function check_user_credentials($email, $password) {
    global $pdo;

    // Ищем пользователя в таблице администраторов
    $stmt = $pdo->prepare("SELECT * FROM `Администратор` WHERE `пароль` = ?");
    $stmt->execute([$password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['email'] === $email) {
        $user['роль'] = 'Администратор'; // Добавляем роль пользователя
        return $user;
    }

    // Ищем пользователя в таблице родителей
    $stmt = $pdo->prepare("SELECT * FROM `Родитель` WHERE `пароль` = ?");
    $stmt->execute([$password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['email'] === $email) {
        $user['роль'] = 'Родитель'; // Добавляем роль пользователя
        return $user;
    }

    // Ищем пользователя в таблице учителей
    $stmt = $pdo->prepare("SELECT * FROM `Учитель` WHERE `пароль` = ?");
    $stmt->execute([$password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['email'] === $email) {
        $user['роль'] = 'Учитель'; // Добавляем роль пользователя
        return $user;
    }

    // Ищем пользователя в таблице учеников
    $stmt = $pdo->prepare("SELECT * FROM `Ученик` WHERE `пароль` = ?");
    $stmt->execute([$password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['email'] === $email) {
        $user['роль'] = 'Ученик'; // Добавляем роль пользователя
        return $user;
    }

    // Если пользователь не найден во всех таблицах, возвращаем сообщение об ошибке
    return ["error" => "Такого пользователя не существует"];
}


