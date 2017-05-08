<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>こ↑こ↓</title>
</head>
<body>
    <h1><?php echo"そんなバナナ"; ?></h1>
    <?php $po = $_POST["na"]; ?>
    <form action="" method="post">
        <input type="text" name="na" size="40">
        <input type="submit" value="送信">
        <?php
            function Loca($var)
            {
                $lo = "どうも";
                $lo2 = "、";
                global $glo;
                echo $lo . $lo2 . $glo . nl2br("\n") . "だっふんだ！" . nl2br("\n");
                echo $var;
                //$lo = "あかん";
            }
            $glo = "私が変なおじさんです。";
            loca($po);
        ?>
    </form>
</body>
</html>
<!--全力で未完成-->
