<!DOCTYPE html>
<head>
    <title>Lesson_4</title>
</head>
<body>
<h3>Калькулятор</h3>

<?php

if(isset($_POST['value1']) && isset($_POST['value2'])) {
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];
    $action = $_POST['action'];
    $result = '';

    switch ($action) {
        case '+':
            $result = $value1 + $value2;
            break;
        case '-':
            $result = $value1 - $value2;
            break;
        case '*':
            $result = $value1 * $value2;
            break;
        case '/':
            if ($value2 == 0)
                $result = 'Деление на ноль запрещено!';
            else
                $result = $value1 / $value2;
            break;
    }
}

?>

<form action="index.php" method="post">
    <input type="number" name="value1" step="any">
    <select name="action">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" name="value2" step="any">
    <input type="submit" value="=">
    <?php
    echo $result;
    ?>
    <hr>
    <a href="index.php"><input type="button" value="Refresh"></a>
</form>

</body>
</html>