<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>������������ ������ �4</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <center>
        <form method="POST">
            <h3>������ ����� �������</h3>
            <p> 2 9 0<br>
                6 0 2<br>
                3 4 0</p>
            <textarea style = "width: 200px; height: 150px;" name="mass" placeholder="������� �������"><?php echo @$_POST["mass"]; ?></textarea><br><br>
            <input type="submit" name="result" value="�����"><br>
        </form>
  <?php
    if (isset($_POST["result"])) {
        $massiv = explode("\n", ($_POST["mass"]));
        //�������� �� ������ ������
        if (empty($massiv) || count($massiv) == 1) {
            echo "��������� ��������� �� �������� �������� (������������� ������������ �����)";
            return false;
        } else {
            echo "���������� ������ �������: ", count($massiv), "<br>";
            //������������ ������ � ������
            for ($i=0; $i < count($massiv); $i++) { 
                $massiv[$i] = explode(" ", $massiv[$i]);
            }
            for ($i=0; $i < count($massiv); $i++) { 
                for ($j=0; $j < count($massiv); $j++) { 
                    $massiv2 = $massiv2.$massiv[$i][$j]." ";
                }
                $massiv2 = $massiv2."<br>";
            }
            //������� ��������� �������
            echo "��������� �������: ","<br>", $massiv2;
            //��������� �������� ������-��������, ��� ������ min() ������� ���������� ����
            for ($i = 0; $i < count($massiv); $i++) {
                for ($j = 0; $j < count($massiv); $j++) {
                    for ($k = 0; $k < count($massiv); $k++) {
                        $massiv[$i][$j] = min($massiv[$i][$j], ($massiv[$i][$k]+$massiv[$k][$j]));
                    }
                }
            }
            //���������� ������������ ������� (������� ���������� �����)
            for ($i = 0; $i < count($massiv); $i++) {
                for ($j = 0; $j < count($massiv); $j++) {
                    $result = $result.$massiv[$i][$j]." ";
                }
                $result = $result."<br>";
            }
            echo "������� ���������� �����: ", "<br>", $result;    
        }
    }
?>
</center>
</body>
</html>