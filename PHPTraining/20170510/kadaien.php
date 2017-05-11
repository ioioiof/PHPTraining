<?php
    $x = 15;
    $x %= 4;
    echo $x."<br>";

    $sb = 7;
    $sb *= 10;
    echo $sb."<br><br><br>";

    echo "<table border='1'>\n";
    for($i=1;$i<=10;$i++){
        echo "<tr>\n";
        for($j=1;$j<=10;$j++){
            echo "<td>".$i*$j."</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";

    echo "<table border='1'>\n";
    $j = 1;
    echo "<tr>\n";
    for($i = 1 ; $i <= 10 ; $i++){
        echo "<td>".$i*$j."</td>\n";
        if($i == 10){
            $i = 1;
            $j++;
            echo "</tr>\n";
        }
        if($j == 11){
            break;
        }
    }
    echo "</table>\n";
 ?>
