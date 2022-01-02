<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = '';
    if (file_exists('db.json')) {
        $json = file_get_contents('db.json');
        $db = json_decode($json, true);
    } else {
        $db = array();
    }
    if ((int)$id-1 < count($db)) {
        array_splice($db, $id-1, 1);
        $db_string = json_encode($db);
        file_put_contents('db.json', $db_string);
        header('Location: index.php');
    } else {
        header('Location: 404.php');
    }
} else {
    header('Location: 404.php');
}
die();

?>