<?php
//セッション開始
session_start();
//名前のセッションがもうあったらテキストボックスに設定しまーす
if(isset($_SESSION["name"])){
    $name = $_SESSION["name"];
    }else{
    //なかったら空白やで
    $name = "";
}
 ?>
<html>
<head>
    <meta charset="utf-8" http-equiv="refresh" content="60">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>掲示板</title>
</head>
<body>
    <h1>それなり掲示板プログラムくん</h1>
    <div id="comment">
        <form action="" method="post">
            <?php
                print '<input type="text" name="hname" placeholder="ハンドルネーム" value="'.$name.'" maxlength="6" class="textarea" id="name">'
            ?>
            <input type="text" name="nai" placeholder="内容" maxlength="300" class="textarea" id="naiyou">
            <input type="submit" value="submit" id="sub">
        </form>
    </div>
    <?php
        date_default_timezone_set('Asia/Tokyo');
        $file_path = "dbb.csv";
        if(isset($_POST['hname']))
        {
            if(isset($_POST['nai']))
            {
                $hn = htmlspecialchars($_POST["hname"],ENT_NOQUOTES,"UTF-8");
                $na = htmlspecialchars($_POST["nai"],ENT_NOQUOTES,"UTF-8");
                $dt1 = date("Y/m/d");
                $dt2 = date("H:i:s");

                if($hn === "" || mb_ereg_match("\s",$hn)){
                    $errors['hname'] = '名前入れろ';
                }elseif($na === "" || mb_ereg_match("\s",$na)){
                    $errors['nai'] = 'なんか書け';
                }else{
                    $datas = array('dt1' => $dt1 , 'dt2' => $dt2 , 'name' => $hn , 'nai' => $na);
                    //ここで書き込むついでにセッションがなかったら名前を保存する
                    //一応HNも書き換えられるように設定しよう
                    if(!isset($_SESSION["name"])||$_SESSION["name"]!=$hn){
                        $_SESSION["name"]=$hn;
                    }
                    if($_SERVER['REQUEST_METHOD'] === 'POST'){
                        $fpa = fopen($file_path , 'a');
                        if($fpa){
                            //rewind($fpa);
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
            echo '<div id="main"><table class="flat-table">';
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
                    if($j==2){
                        echo "\t\t<td width='100'>{$test[$j]}</td>\n";
                    }else{
                        echo "\t\t<td>{$test[$j]}</td>\n";
                    }

                }
                echo "\t</tr>\n";
            }
            //いじってるのここまで

        }
        echo"</table></div>\n";
        fclose($han);
    ?>
</body>
</html>
