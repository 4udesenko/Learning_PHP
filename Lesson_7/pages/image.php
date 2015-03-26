<div class="image">
    <img src="./images/<?php echo $image['image']; ?>">
    <h4>Название: <?= $image['tittle'] ?></h4>
    Дата добавления: <?= $image['date'] ?></br>
    <?php
    $img = getimagesize('./images/' . $image['image']);
    echo('Размер изображения: ' . $img[0] . ' x ' . $img[1] . ' пикселей.</br>');
    $mb = filesize('./images/' . $image['image']);
    $mb = $mb / 1048576;
    echo('Размер файла: ' . round($mb, 2) . ' Мб.');
    ?>
</div>
<a href="./index.php"><h4>Вернуться в галерею</h4></a>