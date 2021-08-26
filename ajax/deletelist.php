<?php
include_once(__DIR__ . "./../classes/List.php");

if (!empty($_POST)) {
    $listItem = new listClass();
    $listItem->setId($_POST["id"]);

    $listItem->delete();
    var_dump($id);
    $response = [
        'status' => 'success',
        'message' => 'list was deleted'
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
