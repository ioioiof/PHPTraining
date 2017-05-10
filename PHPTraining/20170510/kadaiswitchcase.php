<html>
<head>
    <meta charset="utf-8">
    <title>switch,case文課題</title>
</head>
<body>
    <p>色を選んでね！</p>
    <form action="" method="post">
        <input type="radio" id="r1" name="iro" value="赤"><label for="r1">赤</label><br>
        <input type="radio" id="r2" name="iro" value="青"><label for="r2">青</label><br>
        <input type="radio" id="r3" name="iro" value="緑"><label for="r3">緑</label><br>
        <input type="radio" id="r4" name="iro" value="黄色"><label for="r4">黄色</label><br>
        <input type="submit" value="判定">
    </form>
</body>
</html>

<?php
if(isset($_POST["iro"])){
    $po = $_POST["iro"];
    echo "選択：" . $po . "<br>";
    switch ($po) {
        case "赤":
            echo "あなたの好きな色は赤です。";;
            break;
        case "青":
            echo "あなたの好きな色は青です。";
            break;
        case "緑":
            echo "あなたの好きな色は緑です。";
            break;
        case "黄色":
            echo "あなたの好きな色は黄色です。";
            break;
        default:
            echo "not select";
            break;
    }
}
 ?>
