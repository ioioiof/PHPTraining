<?php
    $data = [["a","b","c","d","e"],
             ["f","g","h","i","j"],
             ["k","l","n","m","o"],
             ["p","q","r","s","t"],
             ["u","v","w","x","y"]];
    for($i = 0 ; $i < 5 ; $i++){
        for($j = 0 ; $j < 5 ; $j++){
            if($data[$i][$j] == "b" || $data[$i][$j] == "f" || $data[$i][$j] == "x"){
                echo "<br>";
            }else{
                echo "data[$i][$j]={$data[$i][$j]}<br>";
            }
        }
    }
 ?>
