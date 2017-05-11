<!--文字列のサンプル-->
<?php
    $moziretu = "Enjoy Wasshoi!";
    $En = "Enjoy";
    $Was = "Wasshoi!";
    echo "元：".$moziretu ."<br><br>";
    //文字数を数える
    echo "文字数：".strlen($moziretu)."<br>";
    //ワード数を数える
    echo "ワード数：".str_word_count($moziretu)."<br>";
    //文字列を逆さにする
    echo "逆さ文字：".strrev($moziretu)."<br>";
    //指定した文字列が何番目に出てくるかを出す
    echo "何番目？：".strpos($moziretu,$Was)."<br>";
    //一致した文字列を置換
    echo "置換：".str_replace($En,$Was,$moziretu);
?>
