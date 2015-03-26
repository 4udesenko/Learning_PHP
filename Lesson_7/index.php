<?php

define('ROOT', __DIR__);
include(ROOT . '/db_fns.php');

$view = empty($_GET['view']) ? 'images' : $_GET['view'];

switch ($view) {
    case('images'):
        $images = get_images();
        break;
    case('image'):
        $id = $_GET['id'];
        $image = get_image($id);
        break;
    case('add_to_gallery'):
        add_to_gallery();
        header('Location: /index.php?view=images');
        break;
    case('form'):
        break;
}

$arr = ['images', 'image', 'add_to_gallery', 'form'];
if (!in_array($view, $arr)) die('Такого адреса не существует');

include(ROOT . '/layout/gallery.php');
