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

function getEditableFeedback($action)
{
    if ($action == "edit") {
        $id = secureRequestPrepare((int)$_GET['id']);
        $sql = "SELECT * FROM feedback WHERE id = {$id}";
        return $editable_feedback = getOneResult($sql);
    } else {
        return null;
    }

}

function saveEditableFeedback()
{
    $name = secureRequestPrepare($_POST['name']);
    $text = secureRequestPrepare($_POST['text']);
    $id = secureRequestPrepare((int)$_GET['id']);
    $sql = "UPDATE feedback SET name = '{$name}', text = '{$text}' WHERE id = {$id}";
    var_dump($sql);
    executeSql($sql);
    header('Location: /feedback/?status=edit');
}

function doFeedbackAction($action)
{
    if ($action == "add") {
        addFeedBack();

    }
    if ($action == "delete") {
        deleteFeedBack();
    }

    if ($action == "save") {
        saveEditableFeedback();
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
