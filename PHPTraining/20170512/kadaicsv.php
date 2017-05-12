<?php
    $yy = ["日","月","火","水","木","金","土"];
    $ddd = date("w");
    $da1 = date("Y");
    $da2 = date("m/d")."({$yy[$ddd]})";
    $da3 = date("H:m:s");
    $datas = array('da1' => $da1 , 'da2' => $da2 , '$da3' => $da3);
    $file_p = "testc.csv";

    $fp = fopen($file_p,"a");
    if($fp){
        fputcsv($fp,$datas);
    }
    fclose($fp);

    $fpr = fopen($file_p,"r");
    if($fpr){
        echo "<table>\n";
        while(($fg = fgetcsv($fpr,1000,",")) !== false){
            echo "\t<tr>\n";
            for($i = 0 ; $i < count($fg) ; $i++){
                if($i === 0){
                    echo "\t\t<td>前回:{$fg[$i]}</td>\n";
                }else {
                    echo "\t\t<td>{$fg[$i]}</td>\n";
                }
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";
        fclose($fpr);
    }
 ?>
