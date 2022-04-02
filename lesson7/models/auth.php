<?php
// $_POST['send'] берётся из кнопки submit формы авторизации
if (isset($_POST['send'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    var_dump($login);
    var_dump($password);

    if (!auth($login, $password)) {
        die('Неверный логин или пароль!');
    } else {
        if (isset($_POST['save'])) {
            //генерация hash для сохранения в cookie и БД
            $hash = uniqid(rand(), true);
            $id = (int)$_SESSION['id'];//получаем id пользователя из сессии
            $sql = "UPDATE users SET hash = '{$hash}' WHERE id = '{$id}'";
            executeSql($sql);//обновляем hash в БД для соответствующего id
            setcookie('hash', $hash, time() + 3600, '/');
        }
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}

//Logout
if (isset($_GET['logout'])) {

    $_SESSION = [];
    session_destroy();                          //Уничтожаем сессию

    setcookie('hash', '', time() - 3600, '/');  //Делаем cookie просроченными
    header('Location: /');
}

/**
 * @param $login , введённый в форму
 * @param $password , введённый в форму
 * @return bool
 */
function auth($login, $password): bool
{
    $login = secureRequestPrepare($login);
    $sql = "SELECT id, password FROM users WHERE login = '{$login}'";

    //получение id и hash пароля в БД, соответствующий $login
    $passDb = getOneResult($sql);
    var_dump($passDb);
  
    if (password_verify($password, $passDb['password'])) {
        $_SESSION['login'] = $login;// что приводит к isAuth() = true
        $_SESSION['id'] = $passDb['id'];//id пользователя из БД пишем в сессию
        var_dump($_SESSION);
        die();
        return true;
    }
    return false;
}

/**
 * @return bool Значение $_SESSION['login']
 * Проверяет наличие аутентификации у текущего пользователя
 * Если в $_SESSION['login'] ещё пусто (сессия только началась),
 * но есть значение в $_COOKIE['hash'] (с прошлого сеанса), то
 * ищем login пользователя в БД по значению в $_COOKIE['hash'] и пишем в $_SESSION['login'].
 */
function isAuth(): bool
{
    if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
        $hash = $_COOKIE['hash'];
        // login в БД, соответствующий hash, хранящемуся в cookie
        $login = getUserLoginFromDB($hash);
        // если в БД существует такой login, то в сессию записываем полученный из БД логин
        if (!empty($login)) {
            $_SESSION['login'] = $login;
        }
    }
    return isset($_SESSION['login']); //если COOKIE нет, авторизуем по сессии
}

/**
 * @param $hash хранится в $_COOKIE['hash']
 * @return string Имя пользователя, соответствующее hash в БД.
 * В дальнейшем это позволит возобновить сессию по login пользователя
 * $_SESSION['login']= getUserLoginFromDB($hash)
 */
function getUserLoginFromDB($hash): string
{
    $sql = "SELECT login FROM users WHERE hash ='{$hash}'";
    return getOneResult($sql)['login'];
}

/**
 * @return mixed Возвращает login пользователя из сессии
 */
function getUserLogin()
{
    return $_SESSION['login'];
}