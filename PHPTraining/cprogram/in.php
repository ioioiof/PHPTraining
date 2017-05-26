<?php
    session_start();
    if (isset($_SESSION['ID'])) {
        header("Location:index.php");
    }
    $file_path ="hito.csv";
    if (isset($_POST['ID']) || isset($_POST['pass'])) {
        $data[0] = htmlspecialchars($_POST['ID'],ENT_NOQUOTES,"UTF-8");
        $data[1] = htmlspecialchars($_POST['pass'],ENT_NOQUOTES,"UTF-8");
        if($data[0] === "" || mb_ereg_match("\s",$data[0]) || $data[1] === "" || mb_ereg_match("\s",$data[1])){
            echo '<script type="text/javascript">alert("入力事項に漏れがあります。");</script>';
        }else{
            $fpr = fopen($file_path,'r');
            if($fpr){
                $han = 0;
                while (($fi = fgetcsv($fpr,'r')) !== false) {
                    if($data[0] === $fi[0] && $data[1] === $fi[1]){
                        $han = 1;
                        $finame = $fi[2];
                        break;
                    }else{
                        $han = 0;
                    }
                }
                if($han == 1){
                    $_SESSION['ID'] = $data[0];
                    $_SESSION['id_name'] = $finame;
                    echo '<script>alert("ログインしますた。");location.href="index.php";</script>';
                }else{
                    echo '<script>alert("そんなやつおらんやなｗ");</script>';
                }
            }
            fclose($fpr);
        }


    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>掲示板</title>
    </head>
    <body>
        <form action="" method="post">
            <ul>
                <li>ID</li>
                <li><input type="text" name="ID" maxlength="8" placeholder="8length" size="25"></li>
            </ul>
            <ul>
                <li>pass</li>
                <li><input type="password" name="pass" maxlength="8" placeholder="8length" size="25"></li>
            </ul>
            <ul>
                <li><input type="submit" value="いくで"></li>
            </ul>
            <ul>
                <li><a href="t.php">会員登録しにいく</a></li>
            </ul>
        </form>
    </body>
</html>
