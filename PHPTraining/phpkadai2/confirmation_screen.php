<?php
    //セッションに保持した値を取り出す
    session_start();
    $LName = $_SESSION['LName'];
    $FName = $_SESSION['FName'];
    $sex = $_SESSION['sex'];
    $SAdd = $_SESSION['SAdd'];
    $Pnum = $_SESSION['Pnum'];
    $MAdd = $_SESSION['MAdd'];
    $know = $_SESSION['know'];
    $category = $_SESSION['category'];
    $question = $_SESSION['question'];
    //セッションは消さずそのまま
?>
<!--各入力事項表示-->
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel='stylesheet' href='s.css' type='text/css'>
    <title>مهمة</title>
</head>
<body>
    <div id='di'>التأكيد</div>
    <div class="main">
        <form action="inport.php" method="post">
            <div class="giylou">
                <div class="retu1">الكنية</div>
                <div class="retu2"><?= $LName ?></div>
            </div>
            <div class="giylou">
                <div class="retu1">الاسم الاول</div>
                <div class="retu2"><?= $FName ?></div>
            </div>
            <div class="giylou">
                <div class="retu1">جنس</div>
                <div class="retu2"><?= $sex ?></div>
            </div>
            <div class="giylou">
                <div class="retu1">عنوان الشارع</div>
                <div class="retu2"><?= $SAdd ?></div>
            </div>
            <div class="giylou">
                <div class="retu1">رقم الهاتف</div>
                <div class="retu2"><?= $Pnum ?></div>
            </div>
            <div class="giylou">
                <div class="retu1">عنوان البريد</div>
                <div class="retu2"><?= $MAdd ?></div>
            </div>
            <div class="giylou">
                <div class="retu1">أعرف</div>
                <div class="retu2"><?= $know ?></div>
            </div>
            <div class="giylou">
                <div class="retu1">الفئة</div>
                <div class="retu2"><?= $category ?></div>
            </div>
            <div class="giylou">
                <div class="retu1">سؤال</div>
                <div class="retu2"><?= $question ?></div>
            </div>
            <div class="giylou">
                <div class="retuB">
                    <input type='submit' value='إرسال'>
                    <input type='button' onclick='history.back()' value='إرجاع'>
                </div>
            </div>
        </form>
    </div>
    <div id="di">
        <a href="index.html">اعادة كتابة</a>
    </div>
</body>
</html>
