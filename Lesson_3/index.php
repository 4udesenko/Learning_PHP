<html>
<head>
    <title>Lesson_3</title>
</head>
<body>
<h1>Lesson_3</h1>
<h3>Цикл while</h3>
<p>Вывод чисел, делящихся на 3:</p>
<?php

$i = 1;
do {
    if(0 == $i % 3) {
        echo $i.'</br>';
    }
} while ($i++ <= 100);

?>

<h3>Создание массива случайных чисел</h3>

<?php

function randarr($n)
{
    $array = [];
    $i = 1;

    while ($i <= $n) {
        $array[$i] = rand(0, 100);
        $i++;
    }
    arsort($array);
    foreach ($array as $value) {
        echo $value, '</br>';
    }
}
echo randarr(15);

?>

<h3>Регионы и города</h3>

<?php

$region = [
    'Московская область' => ['Подольск', 'Клин', 'Реутов'],
    'Ярославская область' => ['Ярославль', 'Рыбинск', 'Переславль-Залесский'],
];

foreach ($region as $key => $value) {
    echo '-' . $key . '</br>';
    foreach ($value as $key => $value) {
        if($key == 0) {
            echo '--' . $value;
        } else {
            echo '</br>' . '--' . $value;
        }
    }
    echo '</br>';
}

?>

<h3>Проверка доступа</h3>

<?php

$roles = ['visitor', 'user', 'moderator', 'admin'];

$visitor['role'] = ['visitor'];
$user['role'] = ['visitor', 'user'];
$moderator['role'] = ['visitor', 'user', 'moderator'];
$admin['role'] = ['visitor', 'user', 'moderator', 'admin'];

$admin_panel['role'] = ['admin'];
$main_page['role'] = ['visitor', 'user', 'moderator', 'admin'];

function check($user, $page) {
    foreach ($page['role'] as $value) {
    }
    if (in_array($value, $user['role']) == 1) {
        echo 'Доступ разрешён';
    } else {
        echo 'Доступ запрещён';
    }
}
echo(check($visitor, $admin_panel));

?>
</body>

</html>