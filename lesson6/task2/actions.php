<?php
include "operations.php";

$data = json_decode(file_get_contents('php://input'));

$operand1 = $data -> operand1;
$operand2 = $data -> operand2;
$operation = $data -> operation;

$result = mathOperation($operand1, $operand2, $operation);

$str = "{$operand1} + {$operand2} = {$result}";

$file = fopen("data.txt", 'w');
fputs($file, $str);
fclose($file);

$response = [
    'result' => $result,
];

header("Content-type: application/json");
echo json_encode($response);