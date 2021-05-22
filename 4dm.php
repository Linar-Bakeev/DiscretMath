<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №4</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <center>
        <form method="POST">
            <h3>Пример ввода матрицы</h3>
            <p> 2 9 0<br>
                6 0 2<br>
                3 4 0</p>
            <textarea style = "width: 200px; height: 150px;" name="mass" placeholder="Введите матрицу"><?php echo @$_POST["mass"]; ?></textarea><br><br>
            <input type="submit" name="result" value="Найти"><br>
        </form>
  <?php
    if (isset($_POST["result"])) {
        $massiv = explode("\n", ($_POST["mass"]));
        //проверка на пустую строку
        if (empty($massiv) || count($massiv) == 1) {
            echo "Введенное выражение не является матрицей (перепроверьте правильность ввода)";
            return false;
        } else {
            echo "Количество вершин матрицы: ", count($massiv), "<br>";
            //переписываем строку в массив
            for ($i=0; $i < count($massiv); $i++) { 
                $massiv[$i] = explode(" ", $massiv[$i]);
            }
            for ($i=0; $i < count($massiv); $i++) { 
                for ($j=0; $j < count($massiv); $j++) { 
                    $massiv2 = $massiv2.$massiv[$i][$j]." ";
                }
                $massiv2 = $massiv2."<br>";
            }
            //выводим введенную матрицу
            echo "Введенная матрица: ","<br>", $massiv2;
            //Реализуем алгоритм Флойда-Уоршелла, при помощи min() находим кратчайший путь
            for ($i = 0; $i < count($massiv); $i++) {
                for ($j = 0; $j < count($massiv); $j++) {
                    for ($k = 0; $k < count($massiv); $k++) {
                        $massiv[$i][$j] = min($massiv[$i][$j], ($massiv[$i][$k]+$massiv[$k][$j]));
                    }
                }
            }
            //Записываем получившуюся матрицу (матрица кратчайших путей)
            for ($i = 0; $i < count($massiv); $i++) {
                for ($j = 0; $j < count($massiv); $j++) {
                    $result = $result.$massiv[$i][$j]." ";
                }
                $result = $result."<br>";
            }
            echo "Матрица кратчайших путей: ", "<br>", $result;    
        }
    }
?>
</center>
</body>
</html>