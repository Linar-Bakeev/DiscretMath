<?php
if(isset($_POST["found"])) {
    $mass = explode("\n", ($_POST["mass"]));
    if (count($mass) == 1) {
        echo "��������� ��������� �� �������� ��������";
    } else 
     {
        //���������� ������ �� �����
        for ($i = 0; $i < count($mass); $i++) {
        $mass[$i] = explode(" ", $mass[$i]);
        }
        //1 ���� ������� �� ������� ���������, 0 ��� ���� ��������� ���������
        for ($i = 0; $i < count($mass); $i++) {
            for ($j = 0; $j < count($mass); $j++) {
                if($i == $j){
                    $mass[$i][$j] = 1;
                } else {
                    if($mass[$i][$j] == 0) {
                        $mass[$i][$j] = 0;
                    } else {
                        $mass[$i][$j] = 1;
                    }
                }
            }
        }
        //���� ������� j ��������� ����� k �� i, �� ������ 1
        for ($i = 0; $i < count($mass); $i++) {
            for ($j = 0; $j < count($mass); $j++) {
                for ($k = 0; $k < count($mass); $k++) {
                    if ($mass[$i][$j] == 0) {
                        if (($mass[$i][$k] == 1) && ($mass[$k][$j] == 1)){
                            $mass[$i][$j] = 1;
                        } else {
                            $mass[$i][$j] = $mass[$i][$j];
                        }
                    } else {
                        $mass[$i][$j] = $mass[$i][$j];
                    }
                }
            }
        }
        //���������� ������� ������������
        for ($i = 0; $i < count($mass); $i++) {
            for ($j = 0; $j < count($mass); $j++) {
                    $result = $result.$mass[$i][$j]." ";
            }
            $result = $result."<br>";
        }
        echo "���������� ������ ������� ", count($mass), "<br>";
        echo "��������� ������� ������������: ","<br>", $result;
    }
}
?>