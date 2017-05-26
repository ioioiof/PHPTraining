<?php
    session_start();
    if (isset($_SESSION['ID'])) {
        header("Location:index.php");
    }
    $file_path = "hito.csv";
    $han = 0;
    if(isset($_POST['ID']) || isset($_POST['pass']) || isset($_POST['name'])){
        $data[0] = htmlspecialchars($_POST['ID'],ENT_NOQUOTES,"UTF-8");
        $data[1] = htmlspecialchars($_POST['pass'],ENT_NOQUOTES,"UTF-8");
        $data[2] = htmlspecialchars($_POST['name'],ENT_NOQUOTES,"UTF-8");

        if($data[0] === "" || mb_ereg_match("\s",$data[0]) || $data[1] === "" || mb_ereg_match("\s",$data[1]) || $data[2] === "" || mb_ereg_match("\s",$data[2])){
            echo '<script type="text/javascript">alert("必須項目に未入力があります。");</script>';
        }else{
            $fpr = fopen($file_path,'r');
            if($fpr){
                while (($fi = fgetcsv($fpr,'r')) !== false) {
                    if($data[0] === $fi[0] || $data[2] === $fi[2]){
                        $han = 1;
                        break;
                    }else{
                        $han = 0;
                    }
                }
                if($han == 1){
                    echo '<script>alert("同じID、もしくは同じ名前が登録されています。");</script>';
                }else{
                    for($i=0;$i<count($data);$i++){
                        if(strpos($data[$i],'<') !== false){
                            $data[$i] = str_replace('<','&?!Ds',$data[$i]);
                        }
                        if(strpos($data[$i],'>') !== false){
                            $data[$i] = str_replace('>','&?!sD',$data[$i]);
                        }
                        if(strpos($data[$i],',') !== false){
                            $data[$i] = str_replace(',','&?!comma',$data[$i]);
                        }
                    }
                    if($_SERVER['REQUEST_METHOD'] === 'POST'){
                        $fpa = fopen($file_path , 'a');
                        if($fpa){
                            fputcsv($fpa,$data);
                        }
                        fclose($fpa);
                        $_SESSION['ID'] = $data[0];
                        $_SESSION['id_name'] = $data[2];
                        al();
                    }
                }
            }
        }
    }
    function al(){
        echo '<script>alert("登録完了");location.href = "index.php";</script>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>登録</title>
    </head>
    <body>
        <form class="" action="" method="post">
            <ul>
                <li>ID</li>
                <li><input type="text" name="ID" maxlength="8" placeholder="8length" size="25"></li>
            </ul>
            <ul>
                <li>PASS</li>
                <li><input type="password" name="pass" maxlength="8" placeholder="8length" size="25"></li>
            </ul>
            <ul>
                <li>name</li>
                <li><input type="text" name="name" maxlength="8" placeholder="8length" size="25"></li>
            </ul>
            <ul>
                <li><input type="submit" value="登録しちゃう"></li>
                <li><input type="reset" value="reset"></li>
            </ul>
        </form>
    </body>
</html>
