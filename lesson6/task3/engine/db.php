<?php

function getDb()
{
    static $db = null;
    if (is_null($db)) {
        $db = @mysqli_connect(HOST, USER, PASS, DB) or die("Could not connect: " . mysqli_connect_error());
    }
    return $db;
}

function getAssocResult(string $sql)
{

    $result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));

    $array_result = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }

    return $array_result;
}

function getOneResult($sql)
{
    $result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return mysqli_fetch_assoc($result);
}

function executeSql(string $sql)
{
    @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return mysqli_affected_rows(getDb());
}

function secureRequestPrepare($request)
{
    return mysqli_real_escape_string(getDb(),
        (string)htmlspecialchars(strip_tags($request)));
}