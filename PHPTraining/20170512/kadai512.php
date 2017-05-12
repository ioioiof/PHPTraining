<?php
/*
foreach($_SERVER as $server_key => $server_val){
echo $server_key."<br />\n";
}
*/
$fp = fopen( "aa.txt", "r+" );
$count = fgets( $fp, 10 );
$count++;
rewind( $fp );
fputs( $fp, $count );
fclose( $fp );
if($count > 20){
    $f = fopen("aa.txt","w");
    fwrite($f,"0");
    fclose($f);
    echo "リセットさん";
}else {
    echo "{$count}人";
}

$sco = 14;
printf("%d",$sco);
$year = 2004;
$month = 5;
$day = 4;

printf("今日は%04d年%02d月%02d日です。", $year, $month, $day );
//date_default_timezone_set('Asia/Tokyo');
$yy = ["日","月","火","水","木","金","土"];
$yyy = date("w");
$da = date("Y/m/d ({$yy[$yyy]}) H:m:s");
echo $da;

?>
