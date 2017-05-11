<html>
<head>
    <meta charset="utf-8">
    <title>switch,case文プログラム</title>
</head>
<body>
    <p>入力した値をswitch,case文で判定するプログラムです。</p>
    <br>
    <p>テキストボックスに入力した値によって表示されるテキストが変わります。</p>
    <br>
    <p>0～5の値に対応してます。</p>
    <br>
    <p>0～3なら数字を返し、それ以外はハズレになります。</p>
    <br>
    <form action="" method="post">
        <input type="number" name="suuzi" size="3" min="0" max="5">
        <input type="submit" value="判定">
    </form>
</body>
</html>
<?php
    //$_POST["suuzi"]に値が入っているかどうか判定
    //「isset()」は()内にある値に変数がセットされていてかつ中身がNULLではないならtrueを返します。
    if(isset($_POST["suuzi"])){
        //変数「$po」に値を移す
        $po = $_POST["suuzi"];
        echo "入力値：" . $po . "<br>";
        switch ($po) {
            case 3:
                echo "[3]です。";;
                break;
            case 2:
                echo "[2]です。";
                break;
            case 1:
                echo "[1]です。";
                break;
            case 0:
                echo "[0]です。";
                break;
            default:
                echo "ハズレです。";
                break;
        }
    }else{
        echo "入力値：まだ何も入力されてません。<br>";
    }
    /*補足
    *このプログラムに乱数を組み合わせることで簡単なくじ引きプログラムも組めます。
    */
 ?>
