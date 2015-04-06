<?php
session_start();

$users = [
    'vasya' => '123',
];

if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    if (array_key_exists($_POST['login'], $users) && $_POST['pass'] == $users[$_POST['login']]) {
        $_SESSION['login'] = $_POST['login'];
    }
}

if(isset($_GET['exit'])) {
    session_destroy();
#redirect
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lesson_5</title>
</head>
<body style="text-align: center;">

<h3>Вы зашли на сайт как <?php echo array_key_exists('login', $_SESSION) ? $_SESSION['login'] : 'гость'; ?>.</h3>
<a href="index.php?exit">Выход</a>
<a href="login.php"><p style="text-decoration: underline">Форма входа</p></a>
</body>
</html>