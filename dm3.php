<!DOCTYPE html>
<html>
<head>
	<title>Third Lab</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style\\style3">
</head>
<body>
<div class = "info">
    <h1 style="margin-left: 500px;">�����</h1><table border="1" style=" border-color: #ffe240; margin-left: 150px; margin-top: 100px;"><p>
    <tr style="background: white;"><td>
    ������ ���������: 1,3,3<br>
    ������ ���������: a,b,c<br>
    <br>
    ��������� <br>
    ������������ ����<br>
    ��������� ���������� ��������� � ������ ���������</td>
    <td>������ ���������: 1,3,2<br>
    ������ ���������: a,b,b<br><br>

    ��������� <br>
    ������������ ����<br>
    ��������� ���������� ��������� �� ������ ���������</td></tr>
   
    <tr style="background: white;"><td>������ ���������: 1,0<br>
    ������ ���������: 0,1<br>
    ���������: 1,0,1,0<br><br>
    ��������� <br>
    ��������� �������� ��������</td>
    <td>������ ���������: 1,3,2<br>
    ������ ���������: a,b,c<br>
    ���������: 1,b,2,c,2,a<br><br>
    ��������� <br>
    ��������� �� �������� ��������<br></td></tr>
    </table>
    </div>

    <form action = "" method = "post" style="margin-left: 350px;">
        ������� ������ ��������� >>>
        <input type="text" name ="firstSet" value = "<?php
            if (isset($_POST['firstSet'])){
                echo $_POST['firstSet'];
            }
        ?>"><br>
        ������� ������ ��������� >>>
        <input type="text" name ="secondSet" value = "<?php
            if (isset($_POST['secondSet'])){
                echo $_POST['secondSet'];
            }
        ?>"><br>
        ������� ��������� >>>
        <input type="text" name= "relation" value = "<?php 
             if (isset($_POST['relation'])){
                echo $_POST['relation'];
            }
        ?>"><br>
        <input type="submit" name = "sub" value="���������" class="floating-button">
    </form>
    <?php
        if(isset($_POST['sub'])){
        /*
        * c ������� explode �������� �������� �������
        */

        $relation = explode(',', $_POST['relation']);
        $firstSet = explode(',', $_POST['firstSet']);
        $secondSet = explode(',', $_POST['secondSet']);
        /*
        * ��������� ������ ��������� �������� � ���������
        */
            
        $relationLength = count($relation);
        $fistSetLength = count($firstSet);
        $secondSetLength = count($secondSet);

        /*
        * ���������� ��� ������ ������
        */

        $checkReplayFirstSet = 0;
        $checkReplaySecondSet = 0;
        $checkCountFirstInSecond = 0;
        $checkAccordance = 0;
        $overlap = 0;

        /*
        * ���� ���� ���������� �������� � ������ ��������� � �������� �� ����
        */

        for($i = 0; $i < $fistSetLength; $i++){
            for($j = 0; $j < $fistSetLength; $j++){
                if($i != $j){
                    if($firstSet[$i] == $firstSet[$j]){
                        echo "<br>
                        	<b>
                        ������������ ����!
                        </b>
                            <br>
                        ��������� ���������� ��������� � ������ ���������";
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
        * ���� ���� ���������� �������� �� ������ ��������� � �������� �� ����
        */
        for($i = 0; $i < $secondSetLength; $i++){
           for($j = 0; $j < $secondSetLength; $j++){
               if($i != $j){
                    if($secondSet[$i] == $secondSet[$j]){
                    echo "<br>
                    <b>
                    ������������ ����!
                    </b>
                    <br>
                    ��������� ���������� ��������� �� ������ ���������";
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
        * ���� ���� ������� ��������� ������� ��������� ����������� � ��������� 
        * � ���������� � overlap
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
        * ��� �������������� ��������, ��� ��������� �� �������� ��������
        */

       if($overlap < $fistSetLength ){
           $checkCountFirstInSecond = 1;
           echo "<br>
           ���������
           <br>
           ��������� <b>�� ��������</b> ��������!"; 
       }

        /*
        * ���� ���� ���������� �������� �� ������� ��������� ��������������� 
        * ������ ��������� ������� ���������
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
                                        ���������
                                        </b>
                                        <br>
                                        ��������� <b>�� ��������</b> ��������!";
                                   
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
        * ���� ���� ������, ���� �� ��� �������
        * ��������� �������� ��������
        */
        if($checkReplayFirstSet == 0 and $checkReplaySecondSet == 0
            and $checkCountFirstInSecond == 0 and $checkAccordance == 0){
                echo "<br>
                <b>
                ���������
                </b>
                <br>
                ��������� <b>��������</b> ��������!";
            }
        }

    ?>
</boby>
</html>
