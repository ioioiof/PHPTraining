<?php
function wM(){
    echo "そのまま<br>";
}
wM();
function fN($fname){
    echo "{$fname} 殿<br>";
}
fN("A.オリゼー");
fN("A.アワモリ");
function fN2($fn,$y){
    echo "{$fn}が発見されたのは{$y}年です。<br>";
}
fN2("アスペルギルス・オリゼー","1884");
fN2("アスペルギルス・ショウユ","???");
function sH($minH = 50){
    echo "高さは{$minH}です<br>";
}
sH();
sH(5050);
function sum($x,$y){
    $z = $x + $y;
    return $z;
}
echo "5+5=".sum(5,5)."<br>";
 ?>
