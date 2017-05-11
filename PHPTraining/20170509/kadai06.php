<?php
    //dowhileのやつをforで

    for($i = 1;$i <= 5;$i++)
    {
        echo "number : $i <br>";
    }
    //foreachのやつをforで
    $color = ["赤","緑","青","黄色"];
    for($i = 0 ; $i < count($color) ; $i++)
    {
        echo $color[$i]."<br>";
    }
?>
