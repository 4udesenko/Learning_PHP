<h1>Галерея изображений</h1>

<?php
$image = get_images();
foreach ($image as $item):
    ?>
        <div>
            <a href="index.php?view=image&id=<?php echo $item['id']; ?>">
                <img class="img" src="./images/<?php echo $item['image']; ?>">
            </a>
            <hr>
            <h3><?php echo $item['tittle']; ?></h3>
        </div>
<?php endforeach; ?>

<h3><a href="./index.php?view=form">Добавить изображения в галерею</a></h3>
