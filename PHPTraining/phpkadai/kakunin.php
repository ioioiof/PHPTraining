<?php
    //セッションに保持した値を取り出す
    session_start();
    if(!isset($_SESSION['sname'])){
        header("Location:index.html");
    }else{
        $sname = $_SESSION['sname'];
        $nname = $_SESSION['nname'];
        $sei = $_SESSION['sei'];
        $zilyuusilyo = $_SESSION['zilyuusilyo'];
        $den = $_SESSION['den'];
        $mailadd = $_SESSION['mailadd'];
        $taku_one = $_SESSION['taku_one'];
        $taku_two = $_SESSION['taku_two'];
        $kate = $_SESSION['kate'];
        $nai = $_SESSION['nai'];

    }
?>
<!--各入力事項表示-->
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel='stylesheet' href='style.css' type='text/css'>
    <title>課題</title>
</head>
<body>
    <h4 id='di'>確認</h4>
    <!--送信ボタンでend.phpに遷移-->
    <form action='end.php' method='post' name='form2'>
        <table border='0' cellspacing="15" id='ta'>
            <tr>
                <td>姓</td>
                <td><?= $sname ?></td>
                </tr>
                <tr>
                <td>名</td>
                <td><?= $nname ?></td>
             </tr>
             <tr>
                <td>性別</td>
                <td><?= $sei ?></td>
             </tr>
             <tr>
                <td>住所</td>
                <td><?= $zilyuusilyo ?></td>
             </tr>
             <tr>
                <td>電話番号</td>
                <td><?= $den ?></td>
             </tr>
             <tr>
                <td>メールアドレス</td>
                <td><?= $mailadd ?></td>
             </tr>
             <tr>
                <td>どこで知ったか</td>
                <td><?= $taku_one." ".$taku_two ?></td>
             </tr>
             <tr>
                <td>カテゴリ</td>
                <td><?= $kate ?></td>
             </tr>
             <tr>
                <td>内容</td>
                <td width='300'><?= $nai ?></td>
            </tr>
            <tr id="but">
                <td colspan="2">
                    <input type='submit' value='送信'>
                    <input type='button' onclick='history.back()' value='戻る'>
                </td>
            </tr>
        </table>
    </form>
    <div id="di">
        <a href="index.html">未入力状態でお書き直します。</a>
    </div>
</body>
</html>
