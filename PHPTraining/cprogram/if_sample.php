<html>
<head>
    <meta charset="utf-8">
    <title>if文プログラム</title>
</head>
<body>
    <p>入力した値をif文で判定するプログラムです。</p>
    <br>
    <p>テキストボックスに入力した値によって表示されるテキストが変わります。</p>
    <br>
    <p>マイナスは対応してません。</p>
    <br>
    <form action="" method="post">
        <input type="text" name="suuzi" size="3">
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
        //入力された値が数字かどうか判定
        //「ctype_digit()」は()内にある値がすべて10進数の整数ならtrueを返します。
        if(ctype_digit($po)){
            //「$po」の中身を判定]
            echo "入力値：" . $po . "<br>";
            if($po > 100)/*「$po」の中身が100より上なら実行*/{
                echo "100より上です。";
            }elseif ($po == 0/*「$po」の中身が0なら実行*/) {
                echo "0です。";
            }elseif ($po == 100)/*「$po」の中身が100なら実行*/{
                echo "100です。";
            }elseif ($po >= 50)/*「$po」の中身が0でも100でも100以上でもなく50以上なら実行*/{
                echo "50以上です。";
            }else /*上のどの条件にも当てははまらなかった場合に実行*/{
                echo "50以下です。";
            }
        }else /*数字以外の場合に実行*/{
            echo "数字入力してね";
        }
    }else{
        echo "入力値：まだ何も入力されてません。<br>";
    }
    /*補足
    *<input type="text" name="suuzi" size="2">の「type="text"」の部分を
    *「type="number"」に変更することによって数字のみ入力可能のテキストボックスになります。
    *マイナスも対応します。
    *今回はif判定のサンプルということで数字以外も入力できるようにし、
    *その値も判定でチェックするようにしました。
    */
 ?>
