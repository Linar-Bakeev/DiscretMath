<!DOCTYPE html>
<head>
    <title>Лабораторная работа №5</title>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="example">
        <h3>Пример ввода матрицы</h3>
        <p> 1 0 1<br>
            0 1 1<br>
            1 0 0<br></p>
    </div>
    <form name="form" method="POST">
        <h3>Поле для ввода</h3>
        <textarea name="mass"><?php echo @$_POST["mass"]; ?></textarea><br>
        <input type="submit" name="found" value="Найти матрицу"><br>
        <?php require "functions.php" ?>
    </form>
</body>
</html>
