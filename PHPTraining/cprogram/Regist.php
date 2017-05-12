<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>どら焼き</title>
</head>
<h1>どら焼き</h1>
<form action="" method="post">
    ユーザー名:
    <input type="text" name="name" size="15" value="" required/><br>
    パスワード:
    <input type="password" name="pass" size="15" value="" required/>
    <br><br>
    <input type="submit" value="登録" /><br><br>
</html>

<?php
    $dsn = '';//DB情報を入れてね
    $usr = '';//ゆーざーめー
    $pass = '';//ぱすーわーーｄ－ｄ
    try{
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $db = new PDO($dsn,$dsr,$pass);

        $sql = "INSERT INTO TNAME VALUES('$name','$pass')";
        $db->query($sql);
    }//try
    catch(PDOException $e){
        echo "poi : {$e->getMessage()}";
    }
    finally{
        $db = null;
    }
 ?>
