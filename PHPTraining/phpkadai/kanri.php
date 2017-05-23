<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>課題</title>
</head>
<body>
    <div id="di">管理者ぺぇじ</div>
<?php
    $file_path = "de.csv";
    if(($han = fopen($file_path,"r")) !== false){
        echo "<table border='0' id='ta'>";
        while (($data = fgetcsv($han,1000,",")) !== false) {
            $dat = file($file_path);
            $out_dat = array();
            for($i=0;$i < sizeof($dat);$i++) {
               array_push($out_dat, $dat[$i]);
            }
            rsort($out_dat);
        }
        array_unshift($out_dat, $dat[0]);
        echo "<tr id='trr'><td>No</td><td>Last name</td><td>First name</td><td>gender</td><td>address</td><td>tel</td><td>mailaddress</td><td colspan='2'>know</td><td>Category</td><td>Question</td></tr>";
        for($i = 1;$i < count($out_dat) ; $i++){
            $text=explode(",",$out_dat[$i]);
            if(strpos($text[10],'&?!comma') !== false){
                $text[10] = str_replace('&?!comma',',',$text[10]);
            }
            echo "\t<tr id='trg'>\n";
            for($j=0;$j<11;$j++){
                echo "\t\t<td>{$text[$j]}</td>\n";
            }
            echo "\t</tr>\n";
        }
    }
    echo"</table>\n";
    fclose($han);
?>
<div id="di">
    <button onclick="history.back()">トップへ戻る</button>
</div>
</body>
</html>
