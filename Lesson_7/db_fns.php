<?php

function db_connect()
{
    $host = 'localhost';
    $user = 'root';
    $pswd = '';
    $db = 'gallery';

    $connection = mysql_connect($host, $user, $pswd);
    mysql_query("SET NAMES utf8");
    if (!$connection || !mysql_select_db($db, $connection)) {
        return false;
    }
    return $connection;
}

function dbResultToArray($result)
{
    $res_array = [];
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $res_array[] = $row;
    }
    return $res_array;
}

function getImages()
{
    db_connect();
    $query = "SELECT * FROM images";
    $result = mysql_query($query);
    $result = dbResultToArray($result);
    return $result;
}

function getImage($id)
{
    db_connect();
    $query = "SELECT * FROM images WHERE id='$id'";
    $result = mysql_query($query);
    $result = dbResultToArray($result);
    return $result;
}

function addToGallery($tittle, $img)
{
    db_connect();
    $query = "INSERT INTO images (tittle, image, date) VALUES ('$tittle', '$img', CURRENT_DATE)";
    $result = mysql_query($query);
    return $result;
}

function process($files)
{
    $result = [];
    foreach ($files as $item) {
        if ($files[$item] != "." && $files[$item] != "..") {
            $result[] = $files[$item];
        }
    }
    return $result;
}