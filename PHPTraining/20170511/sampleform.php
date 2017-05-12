<htnl>
    <haed>
        <meta charset="utf-8">
        <title>データ欲しくね？</title>
    </head>
    <body>
        <h1>劇的送信丸</h1>
        <form method="post" action="">
            <input type="text" name="te">
            <input type="submit" value="根流しすっぺ">
        </form>
    </body>
</html>
<?php
    if(isset($_POST['te'])){
        $t = $_POST['te'];
        if($t === "" || mb_ereg_match("\s",$t)){
            echo "やめなされやめなされ･･･無益な殺生はやめなされ･･･";
        }else{
            echo "{$t}:これは･･･根じゃな";
        }
    }
?>
