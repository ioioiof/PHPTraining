<?php
    $ary[] = "11";
    $ary[] = "12";
    $ary[] = "13";
    print_r($ary);
    echo "<br>";
    for($i=0;$i<4;$i++){
        $ary[$i] = 10 + $i;
        echo $ary[$i]."<br>";
    }
    $fri[] = "バナナ";
    $fri[] = "ドリアン";
    $fri[] = "りんご";
    $fri[] = "みかん";

    print_r($fri);
    echo "<br>";
    $aary[] = [5,4,1];
    print_r($aary);
    echo "<br>";

    //連想配列
    $arys = array('それ' => "そり！" , "おきた" => "ぽきた");
    print_r($arys);
    echo "<br>".$arys["それ"]."<br>";
    //サンプル5
    $like2 = array('color' => 'red' , 'food' => 'sushi');
    print_r($like2);
    echo "<br>";
    //サンプル6
    $like1["color"] = "red";
    $like2["food"] = "sushi";
    print_r($like2);
    echo "<br>";
    //サンプル7
    $age=array("yamada"=>"25","honda"=>"37","kato"=>"67");
    echo "yamadaは".$age['yamada']."歳";
    echo "<br>";
    //サンプル8
    $age=array("yamada"=>"25","honda"=>"37","kato"=>"67");
    foreach($age as $x=>$x_value)
    {
        echo "Key=".$x.":Value=".$x_value;
        echo "<br>";
    }
    echo "<br>";
 ?>
