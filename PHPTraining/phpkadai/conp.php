<!--完了しましたって表示する為だけの画面-->
<?php
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
    <form action="silyo.php" method="post" name="form1">
        <table border="0" id="ta">
            <tr>
                <td>お問い合わせ番号</td>
                <td><?php echo $No; ?></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="index.html">トップへ戻る</a></td>
            </tr>
        </table>
    </form>
</body>
</html>
