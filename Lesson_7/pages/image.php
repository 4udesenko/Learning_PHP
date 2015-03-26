<h1>Изображение</h1>
<div class="image">
    <img src="./images/<?php echo $image[0]['image']; ?>">
    <hr>
    <h4>Название: <?= $image[0]['tittle'] ?></h4>
    Дата добавления: <?= $image[0]['date'] ?></br>
    <?php
    $img = getimagesize(ROOT . '/images/' . $image[0]['image']);
    echo('Размер изображения: ' . $img[0] . ' x ' . $img[1] . ' пикселей.</br>');
    $mb = filesize('./images/' . $image[0]['image']);
    $mb = $mb / 1048576;
    echo('Размер файла: ' . round($mb, 2) . ' Мб.');
    ?>
</div>
<h4><a href="./index.php">Вернуться в галерею</a></h4>
