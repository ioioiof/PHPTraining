<!--繰り返し処理のサンプル-->
<?php
    //while
    echo "・while<br>";
    $a=0;
    while ($a <= 3) {
        print($a."<br>");
        $a++;
    }

    //do～while
    echo "<br>・do～while<br>";
    $s=0;
    $i=0;
    do{
        ++$i;
        $s += $i;
    }while ($i < 10);
    print("1から $i までの和は $s <br>");

    //for
    echo "<br>・for<br>";
    for($b=0 ; $b<=3 ; $b++){
        print($b . "<br/>");
    }

    //foreach
    echo "<br>・foreach<br>";
    $color = array("red","green","blue");
    foreach ($color as $value) {
        echo $value."<br>";
        //print("{$value}<br/>");
    }
    //連想配列の場合
    $color = array("red","green","blue");
    foreach ($color as $s => $value) {
        print("{$s}:{$value}<br/>");
        //print("{$iro}:{$value}<br/>");
    }
    //$asd = array('眠い' => '起きろ', '帰りたい'  => 'もうチョイ頑張れ', 'そんな･･･' => '（悲愴）');
    //foreach ($asd as $key => $value) {
    //    print("$key:$value<br>");
    //}

    //break and contiune
    echo "<br>・continue<br>";
    for($i=0;$i<10;$i++)
    {
        if($i==5)
        {
            echo "5に着いた<br>";
            continue;
        }
        echo $i."<br>";
    }
    echo "<hr>";
    echo "・break<br>";
    for($i=0;$i<10;$i++)
    {
        if($i == 5){
            echo "最後になった<br>";
            break;
        }
        echo $i."<br>";
    }
 ?>
