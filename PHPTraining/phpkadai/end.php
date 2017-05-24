<?php
    //そのままセッションに入れられている値を取り出す
    session_start();

    //問い合わせ番号の生成
    //今回は年、月、日、時、分、秒を組み合わせたものを使用
    //別の方法でやるならcsvファイルから読み出してその読み出した値に+1した値を保持する
    //もしくはランダムで値を生成してファイル内に同じものがあるか判定して無ければその値を保持する
    $date = date("ymdHis");
    //その値をセッションに保持
    $_SESSION['No'] = $date;

    //氏名を作成(姓と名を結合)
    $name = $_SESSION['sname'].$_SESSION['nname'];

    //セッションを配列に格納
    $datas[0] = $date;
    $datas[1] = $name;
    $datas[2] = $_SESSION['sei'];
    $datas[3] = $_SESSION['zilyuusilyo'];
    $datas[4] = $_SESSION['den'];
    $datas[5] = $_SESSION['mailadd'];
    $datas[6] = $_SESSION['taku_one'];
    $datas[7] = $_SESSION['taku_two'];
    $datas[8] = $_SESSION['kate'];
    $datas[9] = $_SESSION['nai'];

    //各項目に「,」があるかどうかチェック
    for($i=0 ; $i < count($datas) ; $i++){
        if(strpos($datas[$i],',') !== false){
            //あれば「&?!comma」に置き換える
            $datas[$i] = str_replace(',','&?!comma',$datas[$i]);
        }
        //無ければそのまま
    }
    //内容の改行を<br>に変更
    $datas[9] = str_replace("\r\n", '<br>', $datas[9]);

    //csvファイル名を変数に
    $file_path = "de.csv";

    //更新した際に重複して入力しないようにする処理
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //csvファイルに追記処理
        $fp = fopen($file_path , 'a');
        if($fp){
            fputcsv($fp,$datas);
        }
        fclose($fp);
        //処理した後、conp.php(完了画面)に遷移
        header('Location:conp.php');
    }
?>
