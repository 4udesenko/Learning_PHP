<html>
<head>

</head>
<body>
<H1>Lesson 2</H1>
<h3>Рекурсия</h3>
Числа фибоначчи:
<?php
function fibonacci($n) {
    if($n == 0) {
        return 0;
    } else if($n == 1) {
        return 1;
    }
    else {
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}

echo fibonacci(8);

?>

<h3>Доход по вкладу</h3>
Сумма вклада:

<?php
function vklad($a, $b, $c) {
    if($a == 0 and $b == 0 and $c == 0) {
        return 0;
    }
    else {
        return $a + (((($a / 100) * $c) / 12) * $b); //Капитализация каждый месяц.
    }
}

echo round(vklad(123000, 3, 5), 2);

?>

<h3>Функция даты</h3>
Значение функции:

<?php

function dt($day, $month) {
    if($day < 1 || $day > 31 || $month < 1 || $month > 12) {
        return 'Invalid date';
    }
    $months = [
        'января',
        'февраля',
        'марта',
        'апреля',
        'мая',
        'июня',
        'июля',
        'августа',
        'сентября',
        'октября',
        'ноября',
        'декабря'
    ];
    return sprintf('%d %s', $day, $months[$month-1]);
}

echo dt(13, 12);

?>
</body>

</html>