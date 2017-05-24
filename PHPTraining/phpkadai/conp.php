<!--完了しましたって表示する画面-->
<?php
    //前の画面でセッションに保持した値を取り出す
    session_start();
    $No = $_SESSION['No'];
 ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>課題</title>
</head>
<body>
    <div id="di">完了</div>
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
