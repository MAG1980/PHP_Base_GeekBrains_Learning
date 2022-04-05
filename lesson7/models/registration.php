<?php
function doRegistrationAction($action, $login, $password1, $password2)
{
    switch ($action){
        case 'do':
            if ($password1 === $password2) {
                registerNewUser($login, $password1);
                header('Location:/registration/?status=ok');
            } else {
                header('Location:/registration/?status=error');
            }
            break;
        case 'default':
            break;
    }
}

function registerNewUser($login, $password)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (login, password) VALUES ('{$login}', '{$password}')";
    executeSql($sql);
}

function getRegistrationMessage($status)
{
    $messages =
        [
            'ok' => 'Регистрация прошла успешно!',
            'error' => 'Введённые пароли не совпадают!'
        ];
    return $messages[$status];
}

