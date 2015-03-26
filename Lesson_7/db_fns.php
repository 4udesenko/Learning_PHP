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
    $count = 0;
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $res_array[$count] = $row;
        $count++;
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
    $result = mysql_fetch_array($result);
    return $result;
}

//Добавление изображений в базу
function add_to_gallery()
{
    $img = $_FILES['image']['name'];
    $tittle = $_POST['tittle'];
    db_connect();
    $query = "INSERT INTO images (tittle, image, date) VALUES ('$tittle', '$img', CURRENT_DATE)";
    $result = mysql_query($query);
    return $result;
}

function excess($files)
{
    $result = [];
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] != "." && $files[$i] != "..") {
            $result[] = $files[$i];
        }
    }
    return $result;
}

$dir = ROOT . '/images';
$files = scandir($dir);
$files = excess($files);

$newName = basename($_FILES['image']['name']);

if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $imageinfo = getimagesize($_FILES['image']['tmp_name']);
    if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png') {
        echo('<h2>Допустимы изображения только с расширениями jpeg, gif и png!</h2>');
        echo('<p><a href="index.php">Вернуться в галерею</a></p>');
        exit;
    } else {
        $res = move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "$dir/$newName"
        );
        add_to_gallery();
    }
    header('Location: /Lesson_7/index.php');
}