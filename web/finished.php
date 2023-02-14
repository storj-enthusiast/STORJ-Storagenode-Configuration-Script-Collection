<?php
    $bash_finished = file_get_contents("/var/www/html/finished");
    $data = array("bash_finished" => $bash_finished);
    echo json_encode($data);
?>