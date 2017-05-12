<link rel="stylesheet" href="style.css" type="text/css">
<?php
date_default_timezone_set('Asia/Tokyo');
$file_path = "dbb.csv";
if(($han = fopen($file_path,"r")) !== false){
    echo '<table class="flat-table">';
    while (($data = fgetcsv($han,1000,",")) !== false) {
        //この辺からいじってます
        $dat = file($file_path);
        $out_dat = array();
        for($i=0;$i < sizeof($dat);$i++) {
           array_push($out_dat, $dat[$i]);
        }
        rsort($out_dat);
    }
    array_unshift($out_dat, $dat[0]);
    for($i = 1;$i < count($out_dat) ; $i++){
        $test=explode(",",$out_dat[$i]);
        if(strpos($test[3],"http:") !== false || strpos($test[3],"https:") !== false){
            $pattern_http = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
            $replace_http = '<a href="\1" target="_blank">\1</a>';
            $test[3] = preg_replace( $pattern_http, $replace_http,$test[3]);
        }
        echo "\t<tr>\n";
        for($j=0;$j<4;$j++){
            if($j === 2){
                echo "\t\t<td width='130'>{$test[$j]}</td>\n";
            }elseif($j === 3){
                echo "\t\t<td width='380'>{$test[$j]}</td>\n";
            }
            else{
                echo "\t\t<td width='130'>{$test[$j]}</td>\n";
            }
        }
        echo "\t</tr>\n";
    }
    //いじってるのここまで
}
echo"</table>\n";
fclose($han);
?>
