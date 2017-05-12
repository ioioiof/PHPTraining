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

    <link rel="stylesheet" href="style.css" type="text/css">
    <title>掲示板</title>
</head>
<script src="prototype.js"></script>
<script type="text/javascript">
new Ajax.PeriodicalUpdater(
	    "main",
	    "bbs.php",
	    {
	        "method": "get",
	        "parameters": "p=hoge",
	        frequency: 5, // 5秒ごとに実行
	        onSuccess: function(request) {
	            // 成功時の処理を記述
	            // alert('成功しました');
	        },
            onComplete: function(request) {
	            // 完了時の処理を記述
	            // alert('読み込みが完了しました');
	        },
	        onFailure: function(request) {
	            alert('読み込みに失敗しました');
	        },
	        onException: function (request) {
	            alert('読み込み中にエラーが発生しました');
	        }
	    }
	);
</script>
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
    <div id="err">
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
                        header('Location:index.php',true,303);
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
    ?>
    </div>
    <div id="main"></div>
</body>
</html>
