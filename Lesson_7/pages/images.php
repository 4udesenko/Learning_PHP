<?php
$image = get_images();
foreach ($image as $item):
    ?>

    <a href="index.php?view=image&id=<?php echo $item['id']; ?>">
        <div>
            <img class="img" src="./images/<?php echo $item['image']; ?>">
            <h4><?php echo $item['tittle']; ?></h4>
        </div>
    </a>
<?php endforeach; ?>

<a href="./index.php?view=form"><h3>Добавить изображения в галерею</h3></a>
