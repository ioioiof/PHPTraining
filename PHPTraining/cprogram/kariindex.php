<html>
<head>
    <meta charset="utf-8" http-equiv="refresh" content="45">
    <title>簡易チャットプログラム</title>
</head>
<body>
    <h1>簡易チャット</h1>
    <form action="" method="post">
        <input type="text" name="hname" size="15" placeholder="ハンドルネーム">
        <input type="text" name="nai" size="50" placeholder="内容">
        <input type="submit" value="送信">
    </form>
</body>
</html>
<?php
    date_default_timezone_set('Asia/Tokyo');
    $file_path = "dbb.csv";
    if(isset($_POST['hname']))
    {
        if(isset($_POST['nai']))
        {
            $hn = $_POST["hname"];
            $na = $_POST["nai"];
            $dt1 = date("Y/m/d");
            $dt2 = date("H:i:s");

            if($hn === "" || mb_ereg_match("\s",$hn)){
                $errors['hname'] = '名前入れろ';
            }elseif($na === "" || mb_ereg_match("\s",$na)){
                $errors['nai'] = 'なんか書け';
            }else{
                $datas = array('dt1' => $dt1 , 'dt2' => $dt2 , 'name' => $hn , 'nai' => $na);
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $fpa = fopen($file_path , 'a');
                    if($fpa){
                        fputcsv($fpa,$datas);
                    }
                    fclose($fpa);
                    header('Location:kariindex.php',true,303);
                }
            }
            echo "<ul>";
            foreach($errors as $message){
                echo "<li>";
                echo $message;
                echo "</li>";
            }
            echo "</ul>";
        }
    }

    if(($han = fopen($file_path,"r")) !== false){
        echo "<div style='height:1000px; width:900px; overflow-y:scroll;'><table border='1'>\n";
        while (($data = fgetcsv($han,1000,",")) !== false) {
            echo "\t<tr>\n";
            for($i = 0;$i < count($data) ; $i++){
                echo "\t\t<td>{$data[$i]}</td>\n";
            }
            echo "\t</tr>\n";
        }
        echo"</table></div>\n";

        fclose($han);
    }


?>
<!--なかじまだょ～-->
