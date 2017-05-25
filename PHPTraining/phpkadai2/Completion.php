<!--完了しましたって表示する画面-->
<?php
    //前の画面でセッションに保持した値を取り出す
    session_start();
    $No = $_SESSION['No'];
 ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="s.css" type="text/css">
    <title>مهمة</title>
</head>
<body>
    <div id="di">اكتمال</div>
    <div class="main">
        <form action="" method="post">
            <div class="giylou">
                <div class="retu1">عدد من الاستفسارات</div>
                <div class="retu2"><?= $No ?></div>
            </div>
        </form>
    </div>
    <div id="di">
        <a href="index.php">أعلى</a>
    </div>
</body>
</html>
