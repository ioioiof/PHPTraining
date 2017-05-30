<?php
    session_start();
    $date = date("ymdHis");
    $_SESSION['No'] = $date;
    $name = $_SESSION['LName'].$_SESSION['FName'];
    $datas[0] = $date;
    $datas[1] = $name;
    $datas[2] = $_SESSION['sex'];
    $datas[3] = $_SESSION['SAdd'];
    $datas[4] = $_SESSION['Pnum'];
    $datas[5] = $_SESSION['MADD'];
    $datas[6] = $_SESSION['know'];
    $datas[7] = $_SESSION['category'];
    $datas[8] = $_SESSION['question'];

    //各項目に「,」があるかどうかチェック
    for($i=0 ; $i < count($datas) ; $i++){
        if(strpos($datas[$i],',') !== false){
            //あれば「&?!comma」に置き換える
            $datas[$i] = str_replace(',','&?!comma',$datas[$i]);
        }
        //無ければそのまま
    }
    //内容の改行を<br>に変更
    $datas[8] = str_replace("\r\n", '<br>', $datas[8]);

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
        header('Location:Completion.php');
    }
?>
