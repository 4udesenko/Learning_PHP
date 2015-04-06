<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lesson_5</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            overflow: auto;
        }

        .form {
            text-align: center;
            width: 300px;
            border: 3px solid #00c4c4;
            border-radius: 10px;
            padding: 2%;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -125px 0 0 -125px;
        }
    </style>
</head>
<body>
<form class="form" action="index.php" method="post">
    <p>Ваш логин: <input type="text" name="login"></p>
    <p>Пароль:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="pass"></p>
    <button type="submit" role="button">Вход</button></br>
</form>
</body>
</html>