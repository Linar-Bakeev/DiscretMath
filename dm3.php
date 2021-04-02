<!DOCTYPE html>
<html>
<head>
	<title>Third Lab</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style\\style3">
</head>
<body>
<div class = "info">
    <h1 style="margin-left: 500px;">“есты</h1><table border="1" style=" border-color: #ffe240; margin-left: 150px; margin-top: 100px;"><p>
    <tr style="background: white;"><td>
    ѕервое множество: 1,3,3<br>
    ¬торое множество: a,b,c<br>
    <br>
    –езультат <br>
    Ќекорректный ввод<br>
    Ќесколько одинаковых элементов в первом множестве</td>
    <td>ѕервое множество: 1,3,2<br>
    ¬торое множество: a,b,b<br><br>

    –езультат <br>
    Ќекорректный ввод<br>
    Ќесколько одинаковых элементов во втором множестве</td></tr>
   
    <tr style="background: white;"><td>ѕервое множество: 1,0<br>
    ¬торое множество: 0,1<br>
    ќтношение: 1,0,1,0<br><br>
    –езультат <br>
    ќтношение я¬Ћя≈“—я функцией</td>
    <td>ѕервое множество: 1,3,2<br>
    ¬торое множество: a,b,c<br>
    ќтношение: 1,b,2,c,2,a<br><br>
    –езультат <br>
    ќтношение Ќ≈ я¬Ћя≈“—я функцией<br></td></tr>
    </table>
    </div>

    <form action = "" method = "post" style="margin-left: 350px;">
        ¬ведите первое множество >>>
        <input type="text" name ="firstSet" value = "<?php
            if (isset($_POST['firstSet'])){
                echo $_POST['firstSet'];
            }
        ?>"><br>
        ¬ведите второе множество >>>
        <input type="text" name ="secondSet" value = "<?php
            if (isset($_POST['secondSet'])){
                echo $_POST['secondSet'];
            }
        ?>"><br>
        ¬ведите отношение >>>
        <input type="text" name= "relation" value = "<?php 
             if (isset($_POST['relation'])){
                echo $_POST['relation'];
            }
        ?>"><br>
        <input type="submit" name = "sub" value="ѕроверить" class="floating-button">
    </form>
    <?php
        if(isset($_POST['sub'])){
        /*
        * c помощью explode отдел€ем элементы зап€той
        */

        $relation = explode(',', $_POST['relation']);
        $firstSet = explode(',', $_POST['firstSet']);
        $secondSet = explode(',', $_POST['secondSet']);
        /*
        * вычисл€ем длинну введенных множеств и отношени€
        */
            
        $relationLength = count($relation);
        $fistSetLength = count($firstSet);
        $secondSetLength = count($secondSet);

        /*
        * переменные дл€ записи ошибок
        */

        $checkReplayFirstSet = 0;
        $checkReplaySecondSet = 0;
        $checkCountFirstInSecond = 0;
        $checkAccordance = 0;
        $overlap = 0;

        /*
        * цикл ищет одинаковые элементы в первом множестве и сообщает об этом
        */

        for($i = 0; $i < $fistSetLength; $i++){
            for($j = 0; $j < $fistSetLength; $j++){
                if($i != $j){
                    if($firstSet[$i] == $firstSet[$j]){
                        echo "<br>
                        	<b>
                        Ќекорректный ввод!
                        </b>
                            <br>
                        Ќесколько одинаковых элементов в первом множестве";
                        $checkReplayFirstSet = 1;
                        break;
                   }
               }
            }
             if($checkReplayFirstSet == 1) {
                break;
               }
        }
        /*
        * цикл ищет одинаковые элементы во втором множестве и сообщает об этом
        */
        for($i = 0; $i < $secondSetLength; $i++){
           for($j = 0; $j < $secondSetLength; $j++){
               if($i != $j){
                    if($secondSet[$i] == $secondSet[$j]){
                    echo "<br>
                    <b>
                    Ќекорректный ввод!
                    </b>
                    <br>
                    Ќесколько одинаковых элементов во втором множестве";
                    $checkReplaySecondSet = 1;
                        break;
                     }
                }
            }
            if($checkReplaySecondSet == 1) {
                break;
            }
            }

        /*
        * цикл ищет сколько элементов первого множества прсутствуют в отношении 
        * и записывает в overlap
        */

        for($i = 0; $i < $relationLength; $i++){
            if($checkCountFirstInSecond == 0){
                if($i % 2 == 0){
                    for($j = 0; $j < $fistSetLength; $j++){
                        if($relation[$i] == $firstSet[$j]){
                            $overlap++;
                        }
                    }
                }
            }
        }

        /*
        * при несоответсвтии сообщает, что отношение не €вл€етс€ функцией
        */

       if($overlap < $fistSetLength ){
           $checkCountFirstInSecond = 1;
           echo "<br>
           –езультат
           <br>
           ќтношение <b>Ќ≈ я¬Ћя≈“—я</b> функцией!"; 
       }

        /*
        * цикл ищет одинаковые элементы из первого множества соответствующие 
        * разным элементам второго множества
        */

        for($i = 0; $i < $relationLength; $i++){
            if($checkAccordance == 0){
                for($j = 0; $j < $relationLength; $j++){
                    if($checkAccordance == 0){
                        if($i != $j){
                            if($i % 2 == 0){
                                if($relation[$i] == $relation[$j]){
                                    if($relation[$i + 1] != $relation[$j + 1]){
                                        echo "<br>
                                        <b>
                                        –езультат
                                        </b>
                                        <br>
                                        ќтношение <b>Ќ≈ я¬Ћя≈“—я</b> функцией!";
                                   
                                        $checkAccordance = 1;
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
         /*
        * цикл ищет ошибки, если их нет выводит
        * отношение я¬Ћя≈“—я функцией
        */
        if($checkReplayFirstSet == 0 and $checkReplaySecondSet == 0
            and $checkCountFirstInSecond == 0 and $checkAccordance == 0){
                echo "<br>
                <b>
                –езультат
                </b>
                <br>
                ќтношение <b>я¬Ћя≈“—я</b> функцией!";
            }
        }

    ?>
</boby>
</html>
