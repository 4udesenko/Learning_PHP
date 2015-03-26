<?php
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
    foreach ($files as $item) {
        if ($files[$item] != "." && $files[$item] != "..") {
            $result[] = $files[$item];
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
        echo('<p><a href="index.php?view=form">Вернуться к форме</a></p>');
        exit;
    } else {
        $res = move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "$dir/$newName"
        );
        add_to_gallery();
        echo 'Изображение добавлено';
        echo('<p><a href="index.php?view=form">Вернуться к форме</a></p>');
        exit;
    }
}

?>
<h1>Форма загрузки</h1>

<form action="./index.php?view=form" method="post" enctype="multipart/form-data">
    <p><b>Добавление изображений</b></p>
    <input type="file" name="image">

    <p>Название картинки</p>
    <textarea name="tittle"></textarea></br>
    <input type="submit" value="Добавить">
</form>

<h4><a href="./index.php">Вернуться в галерею</a></h4>
