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

function db_result_to_array($result)
{
    $res_array = [];
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $res_array[] = $row;
    }
    return $res_array;
}

function get_images()
{
    db_connect();
    $query = "SELECT * FROM images";
    $result = mysql_query($query);
    $result = db_result_to_array($result);
    return $result;
}

function get_image($id)
{
    db_connect();
    $query = "SELECT * FROM images WHERE id='$id'";
    $result = mysql_query($query);
    $result = db_result_to_array($result);
    return $result;
}
