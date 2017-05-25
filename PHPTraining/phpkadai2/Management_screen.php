<!--管理者用ページ-->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="s.css" type="text/css">
    <title>مهمة</title>
</head>
<body>
    <div id="di">شاشة إدارة</div>
    <div class="main2">
<?php
    $file_path = "de.csv";
    if(($han = fopen($file_path,"r")) !== false){
        while (($data = fgetcsv($han,1000,",")) !== false) {
            $dat = file($file_path);
            $out_dat = array();
            for($i=0;$i < sizeof($dat);$i++) {
               array_push($out_dat, $dat[$i]);
            }
            rsort($out_dat);
        }
        array_unshift($out_dat, $dat[0]);
        echo "<div class='giylou'>
                <div class='retuK'>No.</div>
                <div class='retuK'>اسم</div>
                <div class='retuK'>جنس</div>
                <div class='retuK'>عنوان</div>
                <div class='retuK'>رقم الهاتف</div>
                <div class='retuK'>عنوان البريد الإلكتروني</div>
                <div class='retuK'>أعرف</div>
                <div class='retuK'>فئة</div>
                <div class='retuK'>سؤال</div>
            </div>";
        for($i = 1;$i < count($out_dat) ; $i++){
            $text = explode(",",$out_dat[$i]);
            echo "\t<div class='giylou'>\n";
            for($j = 0 ; $j < count($text) ; $j++){
                if(strpos($text[$j],'&?!comma') !== false){
                    $text[$j] = str_replace('&?!comma',',',$text[$j]);
                }
                if(strpos($text[$j],'&?!Ds') !== false){
                    $text[$j] = str_replace('&?!Ds','＜',$text[$j]);
                }
                if(strpos($text[$j],'&?!sD') !== false){
                    $text[$j] = str_replace('&?!sD','＞',$text[$j]);
                }
                echo "\t\t<div class='retuK2'>{$text[$j]}</div>\n";
            }
            echo "\t</div>\n";
        }
    }
    fclose($han);
?>
</div>
<div id="di">
    <button onclick="history.back()">أعلى</button>
</div>
</body>
</html>
