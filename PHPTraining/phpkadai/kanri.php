<!--管理者用ページ-->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>課題</title>
</head>
<body>
    <h4 id="di">管理者ぺぇじ</h4>
<?php
    //csvファイルの名前を変数に
    $file_path = "de.csv";

    //csvファイルを読み込み専用で開く
    if(($han = fopen($file_path,"r")) !== false){
        //開けたらtableを作成
        echo "<table border='0' id='ta'>";

        while (($data = fgetcsv($han,1000,",")) !== false) {
            //ファイル全体を読み込み配列に格納
            $dat = file($file_path);
            $out_dat = array();

            //別配列に格納
            for($i=0;$i < sizeof($dat);$i++) {
               array_push($out_dat, $dat[$i]);
            }
            //ソート
            rsort($out_dat);
        }
        //配列の最初に加える
        array_unshift($out_dat, $dat[0]);

        //tableの一番上で各項目名を表示
        echo "<tr id='trr'>
                <td>No.</td>
                <td>氏名</td>
                <td>性別</td>
                <td>住所</td>
                <td>電話番号</td>
                <td>メールアドレス</td>
                <td colspan='2'>どこで知ったか</td>
                <td>質問カテゴリ</td>
                <td>質問内容</td>
            </tr>";

        //表示
        for($i = 1;$i < count($out_dat) ; $i++){
            //textにカンマ区切りを分けて配列として格納
            $text = explode(",",$out_dat[$i]);
            //偶数行と奇数行で背景色を変える処理
            if($i%2 == 0){
                echo "\t<tr id='trg'>\n";
            }else{
                echo "\t<tr id='trg2'>\n";
            }
            for($j = 0 ; $j < count($text) ; $j++){
                //各項目に「&?!comma」があれば「,」に戻す
                if(strpos($text[$j],'&?!comma') !== false){
                    $text[$j] = str_replace('&?!comma',',',$text[$j]);
                }

                if($j == count($text)-1){
                    //表示
                    echo "\t\t<td class='ww'>{$text[$j]}</td>\n";
                }else{
                    //表示
                    echo "\t\t<td>{$text[$j]}</td>\n";
                }

            }
            echo "\t</tr>\n";
        }
        echo"</table>\n";
    }//if
    //ファイルを閉じる
    fclose($han);
?>
<div id="di">
    <input type="button" onclick="history.back()" value="トップへ戻る">
</div>
</body>
</html>
