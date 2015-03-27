<?php

$dir = ROOT . '/images';
$files = scandir($dir);
$files = process($files);

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
        add_to_gallery($_POST['tittle'], $_FILES['image']['name']);
        echo 'Изображение добавлено';
        echo('<p><a href="index.php?view=form">Вернуться к форме</a></p>');
        echo('<p><a href="index.php?view=images">Вернуться в галерею</a></p>');
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
