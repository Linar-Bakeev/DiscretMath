<!DOCTYPE html>
<html>
<head>
	<title>Third Lab</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style\\style3">
</head>
<body>
    <form action = "" method = "post" style="margin-left: 350px;">
        Ââåäèòå ïåðâîå ìíîæåñòâî >>>
        <input type="text" name ="firstSet" value = "<?php
            if (isset($_POST['firstSet'])){
                echo $_POST['firstSet'];
            }
        ?>"><br>
        Ââåäèòå âòîðîå ìíîæåñòâî >>>
        <input type="text" name ="secondSet" value = "<?php
            if (isset($_POST['secondSet'])){
                echo $_POST['secondSet'];
            }
        ?>"><br>
        Ââåäèòå îòíîøåíèå >>>
        <input type="text" name= "relation" value = "<?php 
             if (isset($_POST['relation'])){
                echo $_POST['relation'];
            }
        ?>"><br>
        <input type="submit" name = "sub" value="Ïðîâåðèòü" class="floating-button">
    </form>
    <?php
        if(isset($_POST['sub'])){
        /*
        * c ïîìîùüþ explode îòäåëÿåì ýëåìåíòû çàïÿòîé
        */

        $relation = explode(',', $_POST['relation']);
        $firstSet = explode(',', $_POST['firstSet']);
        $secondSet = explode(',', $_POST['secondSet']);
        /*
        * âû÷èñëÿåì äëèííó ââåäåííûõ ìíîæåñòâ è îòíîøåíèÿ
        */
            
        $relationLength = count($relation);
        $fistSetLength = count($firstSet);
        $secondSetLength = count($secondSet);

        /*
        * ïåðåìåííûå äëÿ çàïèñè îøèáîê
        */

        $checkReplayFirstSet = 0;
        $checkReplaySecondSet = 0;
        $checkCountFirstInSecond = 0;
        $checkAccordance = 0;
        $overlap = 0;

        /*
        * öèêë èùåò îäèíàêîâûå ýëåìåíòû â ïåðâîì ìíîæåñòâå è ñîîáùàåò îá ýòîì
        */

        for($i = 0; $i < $fistSetLength; $i++){
            for($j = 0; $j < $fistSetLength; $j++){
                if($i != $j){
                    if($firstSet[$i] == $firstSet[$j]){
                        echo "<br>
                        	<b>
                        Íåêîððåêòíûé ââîä!
                        </b>
                            <br>
                        Íåñêîëüêî îäèíàêîâûõ ýëåìåíòîâ â ïåðâîì ìíîæåñòâå";
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
        * öèêë èùåò îäèíàêîâûå ýëåìåíòû âî âòîðîì ìíîæåñòâå è ñîîáùàåò îá ýòîì
        */
        for($i = 0; $i < $secondSetLength; $i++){
           for($j = 0; $j < $secondSetLength; $j++){
               if($i != $j){
                    if($secondSet[$i] == $secondSet[$j]){
                    echo "<br>
                    <b>
                    Íåêîððåêòíûé ââîä!
                    </b>
                    <br>
                    Íåñêîëüêî îäèíàêîâûõ ýëåìåíòîâ âî âòîðîì ìíîæåñòâå";
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
        * öèêë èùåò ñêîëüêî ýëåìåíòîâ ïåðâîãî ìíîæåñòâà ïðñóòñòâóþò â îòíîøåíèè 
        * è çàïèñûâàåò â overlap
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
        * ïðè íåñîîòâåòñâòèè ñîîáùàåò, ÷òî îòíîøåíèå íå ÿâëÿåòñÿ ôóíêöèåé
        */

       if($overlap < $fistSetLength ){
           $checkCountFirstInSecond = 1;
           echo "<br>
           Ðåçóëüòàò
           <br>
           Îòíîøåíèå <b>ÍÅ ßÂËßÅÒÑß</b> ôóíêöèåé!"; 
       }

        /*
        * öèêë èùåò îäèíàêîâûå ýëåìåíòû èç ïåðâîãî ìíîæåñòâà ñîîòâåòñòâóþùèå 
        * ðàçíûì ýëåìåíòàì âòîðîãî ìíîæåñòâà
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
                                        Ðåçóëüòàò
                                        </b>
                                        <br>
                                        Îòíîøåíèå <b>ÍÅ ßÂËßÅÒÑß</b> ôóíêöèåé!";
                                   
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
        * öèêë èùåò îøèáêè, åñëè èõ íåò âûâîäèò
        * îòíîøåíèå ßÂËßÅÒÑß ôóíêöèåé
        */
        if($checkReplayFirstSet == 0 and $checkReplaySecondSet == 0
            and $checkCountFirstInSecond == 0 and $checkAccordance == 0){
                echo "<br>
                <b>
                Ðåçóëüòàò
                </b>
                <br>
                Îòíîøåíèå <b>ßÂËßÅÒÑß</b> ôóíêöèåé!";
            }
        }

    ?>
</boby>
</html>
