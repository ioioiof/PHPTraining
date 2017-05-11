<html>
<head>
    <meta charset="utf-8">
    <title>not title</title>
</head>
<body>
    <h1>課題くん</h1>
    <form action="" method="post">
        <div>数字を入れてね</div>
        <input type="number" name="num" size="15" max="29" min="1">
        <input type="number" name="num2" max="29" min="1">
        <input type="submit" value="送信">
    </form>
</body>
</html>
<?php
    if(isset($_POST['num'])){
        if(isset($_POST['num2'])){
            $k = $_POST['num'];
            $k2 = $_POST['num2'];
            if($k === "" || mb_ereg_match("\s",$k)){
                echo 'なんかいれて<br>';
            }elseif ($k2 === "" || mb_ereg_match("\s",$k2)){
                han($k);
            }else{
                hann($k,$k2);
            }
        }

    }
    function han($num){
        echo "平成{$num}年度の新入社員研修がstartしました。頑張れ";
    }
    function hann($num,$num2){
        $num += 5;
        $num2 += 6;
        echo "{$num}:{$num2}<br>";
    }
    function addf($nu){
        $nu+=5;
    }
    function adds($nu){
        $nu+=6;
    }
    $or = 10;
    addf($or);
    echo "<h2>ここから課題2</h2><br>{$or}<br>";
    adds($or);
    echo "{$or}<br>";
 ?>
