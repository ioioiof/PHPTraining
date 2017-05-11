<?php
    $file_path = "dbb.csv";
    $export_csv_title = array("日付","HN","IP","内容");
    if(isset($_POST['hname']))
    {
        if(isset($_POST['nai']))
        {
            $hn = $_POST["hname"];
            $na = $_POST["nai"];
            $ip = $_SERVER["REMOTE_ADDR"];
            $dt = date('Y/m/d/H:i:s');
            echo $dt . "：" . $hn ."：". $na ."：". $ip;
        }
    }
?>
<!--全力で未完成-->
