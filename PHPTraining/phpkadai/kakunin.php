<?php
    session_start();
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

echo "
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel='stylesheet' href='style.css' type='text/css'>
    <title>課題</title>
</head>
<body>
    <div id='di'>確認</div>
    <form action='' method='post' name='form2'>
        <table border='0' id='ta'>
            <tr>
                <td>姓</td>
                <td>$sname</td>
                </tr>
                <tr>
                <td>名</td>
                <td>$nname</td>
             </tr>
             <tr>
                <td>性別</td>
                <td>$sei</td>
             </tr>
             <tr>
                <td>住所</td>
                <td>$zilyuusilyo</td>
             </tr>
             <tr>
                <td>電話番号</td>
                <td>$den</td>
             </tr>
             <tr>
                <td>メールアドレス</td>
                <td>$mailadd</td>
             </tr>
             <tr>
                <td>どこで知ったか</td>
                <td>$taku_one $taku_two</td>
             </tr>
             <tr>
                <td>カテゴリ</td>
                <td>$kate</td>
             </tr>
             <tr>
                <td>内容</td>
                <td>$nai</td>
            </tr>
            <tr>
                <td><input type='submit' value='送信'></td>
                <td><input type='button' onclick='history.back()' value='戻る'></td>
        </table>
    </form>
</body>
</html>
";
?>
