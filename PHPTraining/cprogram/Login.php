<!DOCTYPE html>
<html lang="ja">

<head>
    <title>生麦生米生姜</title>
    <meta charset="UTF-8">
    <style type="text/css">
    h1  {text-align: center;}
    form{text-align: center;}
    h2  {font-size: 128px;}
    </style>
</head>

<body>
    <h1>生麦　生米　生姜</h1>
    <form action="Login.php" method="post">
        ユーザー名:
        <input type="text" name="name" size="15" value="" required/><br>
        パスワード:
        <input type="password" name="pass" size="15" value="" required/>
        <br><br>
        <input type="submit" value="入室" /><br><br>
        <h2><a href="Regist.php">新規登録</a></h2>
</body>
</html>

<?php
    $dsn = '';//DB情報を入れてね
    $usr = '';//ゆーざーめー
    $pass = '';//ぱすーわーーｄ－ｄ
    try{
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $db = new PDO($dsn,$dsr,$pass);

        $sql = "SELECT * FROM TNAME WHERE name = $name";
        $db->query($sql);
    }//try
    catch(PDOException $e){
        echo "poi : {$e->getMessage()}";
    }
    finally{
        $db = null;
    }
 ?>
