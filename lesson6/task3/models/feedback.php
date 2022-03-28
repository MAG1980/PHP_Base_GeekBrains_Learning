<?php
function getAllFeedback()
{
    $sql = "SELECT * FROM feedback ORDER BY id DESC";
    return getAssocResult($sql);
}

function addFeedBack()
{
    $name = secureRequestPrepare($_POST['name']);
    $feedback = secureRequestPrepare($_POST['text']);
    $_Post = [];
    var_dump($_POST);

    if ($name === '' || $feedback === '') {
        header('Location:/feedback/?status=error');
    } else {
        executeSql("INSERT INTO feedback (name, text) VALUES ('{$name}', '{$feedback}')");
        header('Location:/feedback/?status=ok');
    }
}

function deleteFeedBack()
{
    $id = secureRequestPrepare((int)$_GET['id']);
    $sql = "DELETE FROM feedback WHERE id = {$id}";
    var_dump($sql);
    executeSql($sql);
    var_dump($id);
    header('Location:/feedback/?status=delete');
    die();
}

function doFeedbackAction($action)
{
    if ($action == "add") {
        addFeedBack();

    }
    if ($action == "delete") {
        var_dump($_GET);
        deleteFeedBack();
        die();
    }
    if ($action == "edit") {
        var_dump($_POST);
        die();
    }
    if ($action == "save") {
        var_dump($_POST);
        die();
    }
}

function getFeedbackMessage()
{
    $messages = [
        'ok' => 'Сообщение добавлено',
        'delete' => 'Сообщение удалено',
        'edit' => 'Сообщение изменено',
        'error' => 'Возникла ошибка!'
    ];
    return (isset($_GET['status'])) ? $messages [$_GET['status']] : '';
}
