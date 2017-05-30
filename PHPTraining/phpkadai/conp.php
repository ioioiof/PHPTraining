<!--完了しましたって表示する画面-->
<?php
    //前の画面でセッションに保持した値を取り出す
    session_start();
    if(!isset($_SESSION['No'])){
        header("Location:index.html");
    }else{
        $No = $_SESSION['No'];
        session_destroy();
    }
 ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>課題</title>
</head>
<body>
    <h4 id="di">完了</h4>
    <form action="" method="post">
        <table border="0" id="ta">
            <tr>
                <td>お問い合わせ番号</td>
                <td><?= $No ?></td>
            </tr>
        </table>
    </form>
    <div id="di">
        <a href="index.html">トップへ戻る</a>
    </div>
</body>
</html>
