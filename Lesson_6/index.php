<?php //not complete

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

function write()
{
    $newName = basename($_FILES['image']['name']);
    $description = $_POST['description'] . '
';
    $str = $newName . ' = ' . $description;
    $res = fopen('file', 'a');
    fwrite($res, $str);
    fclose($res);
}

$dir = 'images';
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
        write($newName, $description);
    }
    header('Location: /Lesson_6/index.php');
}

?><!DOCTYPE html>
<html>
<head>
    <title>Lesson_6</title>
    <style>
        div {
            display: inline-block;
            border: 1px solid #009999;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 10px;
        }

        div:hover {
            background: #cdf5ff;
        }

        img {
            width: 300px;
            height: 300px;
        }

        form {
            width: 350px;
            border: 1px solid black;
            padding: 0 0 10px 10px;
        }
    </style>
</head>
<body>

<h1>Галерея изображений</h1>

<?php for ($i = 0; $i < count($files); $i++) { ?>
    <div>
        <img src="<?= $dir . "/" . $files[$i] ?>"/>

        <p>Описание</p>
    </div>
<?php } ?>

<form method="post" enctype="multipart/form-data">
    <p><b>Добавление изображений</b></p>
    <input type="file" name="image">

    <p>Описание картинки</p>
    <textarea name="description"></textarea>
    <input type="submit" value="Добавить">
</form>

</body>
</html>