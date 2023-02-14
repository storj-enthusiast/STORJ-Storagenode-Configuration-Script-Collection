<?php
$decoded = json_decode(file_get_contents('php://input'), true);

$result = '';
foreach ($decoded as $key => $value) {
    $result .= $key . '="' . $value . '" ';
}
file_put_contents("storj_variables", $result);
?>
