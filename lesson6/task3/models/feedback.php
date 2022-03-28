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
    executeSql("INSERT INTO feedback (name, text) VALUES ('{$name}', '{$feedback}')");
//    die();
}

function deleteFeedBack()
{
    var_dump($_POST);
    die();
}

function doFeedbackAction($action)
{
    if ($action == "add") {
        addFeedBack();

    }
    if ($action == "save") {
        var_dump($_POST);
        die();
    }
    if ($action == "edit") {
        var_dump($_POST);
        die();
    }
}
