<html>

<body>
<h1>Lesson 1</h1>
<?php
$a = 15;
$b = 3.14;
$c = 'Hello, World!';
$d = True;
define('INT',15);
define('FLOAT', 3.14);
define('STRING', 'Hello, World!');
define('BOOL', True);
$e = 10;
$f = '20 приветов';
$g = 'приветов 20';
?>
<oL>
    <li>
        <h3>Переменные:</h3>
        <ul>
            <li><?php echo $a; ?></li>
            <li><?php echo $b; ?></li>
            <li><?php echo $c; ?></li>
            <li><?php echo $d; ?></li>
        </ul>
        <h3>Константы:</h3>
        <ul>
            <li><?php echo INT; ?></li>
            <li><?php echo FLOAT; ?></li>
            <li><?php echo STRING; ?></li>
            <li><?php echo BOOL; ?></li>
        </ul>
    </li>
    <li>
        <h3>Переменные:</h3>
        <ul>
            <li><?php echo "$a"; ?></li>
            <li><?php echo "$b"; ?></li>
            <li><?php echo "$c"; ?></li>
            <li><?php echo "$d"; ?></li>
        </ul>
        <h3>Константы:</h3>
        С двойными кавычками константы при выводе определяются как строка
        <ul>
            <li><?php echo "INT"; ?></li>
            <li><?php echo "FLOAT"; ?></li>
            <li><?php echo "STRING"; ?></li>
            <li><?php echo "BOOL"; ?></li>
        </ul>
    </li>
    <li>
        <h3>Переменные:</h3>
        При использовании одиночных кавычек выводится имя переменной, а не значение
        <ul>
            <li><?php echo '$a'; ?></li>
            <li><?php echo '$b'; ?></li>
            <li><?php echo '$c'; ?></li>
            <li><?php echo '$d'; ?></li>
        </ul>
        <h3>Константы:</h3>
        Константы также определяются как строка, как и во втором случае
        <ul>
            <li><?php echo 'INT'; ?></li>
            <li><?php echo 'FLOAT'; ?></li>
            <li><?php echo 'STRING'; ?></li>
            <li><?php echo 'BOOL'; ?></li>
        </ul>
    </li>
    <li>
        <h3>Выражения:</h3>
        <p><?php echo $e + $f; ?> - здесь берётся целое число из строки</p>
        <p><?php echo $g + $e; ?></p>
        <p><?php echo $e + $d; ?> - true имеет значение "1"</p>
    </li>
</oL>

</body>

</html>