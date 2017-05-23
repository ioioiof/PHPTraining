<?php
    session_start();
    $sname = $_SESSION['sname'];
    $nname = $_SESSION['nname'];
    $sei = $_SESSION['sei'];
    $zi = $_SESSION['zilyuusilyo'];
    $den = $_SESSION['den'];
    $mailadd = $_SESSION['mailadd'];
    $taku_one = $_SESSION['taku_one'];
    $taku_two = $_SESSION['taku_two'];
    $kate = $_SESSION['kate'];
    $nai = $_SESSION['nai'];
    switch ($sei) {
        case 0:
            $sei = "男";
            break;
        case 1:
            $sei = "女";
            break;
        case 2:
            $sei = "不明";
        default:
            break;
    }
    $nai = str_replace("\r\n", '<br>', $nai);
    //問い合わせ番号の生成
    $date = date("ymdHis");
    $_SESSION['No'] = $date;

    //csvファイル名を変数に
    $file_path = "de.csv";

    //入力されたデータを配列に
    $datas = array('no' => $date , 'sname' => $sname , 'nname' => $nname , 'sei' => $sei , 'zi' => $zi , 'den' => $den , 'mailadd' => $mailadd , 'taku_one' => $taku_one , 'taku_two' => $taku_two , 'kate' => $kate , 'nai' => $nai);

    //csvファイルに追記処理
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fp = fopen($file_path , 'a');
        if($fp){
            fputcsv($fp,$datas);
        }
        fclose($fp);
        header('Location:conp.php');
    }
?>
