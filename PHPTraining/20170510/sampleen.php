<?php
    $x = 10;
    $y = 6;
    echo $x + $y ."<br>";

    $s = 114;
    $s += 514;
    echo $s."<br>";

    $x = 110;
    $y = 110;
    echo var_dump($x == $y)."<br>";

    $i = 110;
    $j = "110";
    echo var_dump($i === $j)."<br>";

    $g = 50;
    $h = 50;
    echo var_dump($g >= $h)."<br>";

    $d = 10;
    echo ++$d."<br>";

    $a = 20;
    echo $a++."<br>";

    $f = 100;
    $l = 50;
    if($f == 100 and $l == 50){
        echo "なんとぉ！<br>";
    }
    if($f == 100 && $l == 50){
        echo "なんとぉ！<br>";
    }

    $txt1 = "えぇ";
    $txt2 = "なにそれ";
    echo $txt1 . $txt2 ."<br>";

    $txt1 .= "す";
    echo $txt1 . "<br>";
 ?>
