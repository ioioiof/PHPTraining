<?php
    if(isset($_POST['question'])){
        $ques = $_POST['question'];
        if(strpos($ques,'<') !== false){
            $ques = str_replace('<','&?!Ds',$ques);
        }elseif(strpos($ques,'>') !== false){
            $ques = str_replace('>','&?!sD',$ques);
        }
    }

    if(isset($_POST['LName']) || isset($_POST['FName'])){
        $LName = htmlspecialchars($_POST["LName"],ENT_NOQUOTES,"UTF-8");
        $FName = htmlspecialchars($_POST['FName'],ENT_NOQUOTES,"UTF-8");
        if($LName === "" || mb_ereg_match("\s",$LName) || $FName === "" || mb_ereg_match("\s",$FName)){
            al();
        }else{
            if(isset($_POST['MAdd1']) || isset($_POST['MAdd2'])){
                $MAdd1 = htmlspecialchars($_POST['MAdd1'],ENT_NOQUOTES,"UTF-8");
                $domain = htmlspecialchars($_POST['MAdd2'],ENT_NOQUOTES,"UTF-8");
                if($MAdd1 === "" || mb_ereg_match("\s",$MAdd1) || $domain === "" || mb_ereg_match("\s",$domain)){
                    al();
                }else{
                    if(isset($_POST['Pnum1']) || isset($_POST['Pnum2']) || isset($_POST['Pnum3'])){
                        $Pnum1 = htmlspecialchars($_POST['Pnum1'],ENT_NOQUOTES,"UTF-8");
                        $Pnum2 = htmlspecialchars($_POST['Pnum2'],ENT_NOQUOTES,"UTF-8");
                        $Pnum3 = htmlspecialchars($_POST['Pnum3'],ENT_NOQUOTES,"UTF-8");
                        if($Pnum1 === "" || mb_ereg_match("\s",$Pnum1) || $Pnum2 === "" || mb_ereg_match("\s",$Pnum2) || $Pnum3 === "" || mb_ereg_match("\s",$Pnum3)){
                            al();
                        }else{
                            if(!ctype_digit($Pnum1) || !ctype_digit($Pnum2) || !ctype_digit($Pnum3)){
                                echo '<script type="text/javascript">alert("電話番号は半角数字で入力してください。");history.go(-1);</script>';
                            }else{
                                session_start();
                                $_SESSION['FName'] = $FName;
                                $_SESSION['LName'] = $LName;
                                $_SESSION['sex'] = $_POST['sex'];
                                $Pnum = $Pnum1.$Pnum2;
                                $_SESSION['Pnum'] =  $Pnum.$Pnum3;
                                $_SESSION['MAdd'] = $MAdd1."@".$domain;
                                $_SESSION['SAdd'] = $_POST['SAdd'];
                                $_SESSION['know_one'] = $_POST['know_one'];
                                $_SESSION['know_two' ]= $_POST['know_two'];
                                $_SESSION['category'] = $_POST['category'];
                                $_SESSION['question'] = $ques;
                                header("Location: confirmation_screen.php");
                            }//Pnum1,2,3の数字チェック
                        }//Pnum1,2,3の空白チェック
                    }//Pnum1,2,3
                }//MAdd1,MAdd2の空白チェック
            }//MAdd1,MAdd2
        }//LName,FNameの空白チェック
    }//LName,FName
    function al(){
        //アラートを呼び出し、処理前に戻る
        echo '<script type="text/javascript">alert("خطأ");history.go(-1);</script>';
    }
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="s.css" type="text/css">
    <title>مهمة</title>
</head>
<body>
    <div id="di">تحقيق</div>
    <div class="main">
        <form action="" method="post" name="form1">
            <ul class="giylou">
                <li class="retu1">الكنية</li>
                <li class="retu2">
                    <input type="text" name="LName" maxlength="8" placeholder="الكنية">
                </li>
            </ul>

            <ul class="giylou">
                <li class="retu1">الاسم الاول</li>
                <li class="retu2">
                    <input type="text" name="FName" maxlength="8" placeholder="الاسم الاول">
                </li>
            </ul>

            <ul class="giylou">
                <li class="retu1">جنس</li>
                <li class="retu2">
                    <label><input type="radio" name = "sex" value="رجالي" checked>رجالي</label>
                    <label><input type="radio" name = "sex" value="نساء">نساء</label>
                    <label><input type="radio" name = "sex" value="غير معروف">غير معروف</label>
                </li>
            </ul>

            <ul class="giylou">
                <li class="retu1">عنوان الشارع</li>
                <li class="retu2">
                    <input type="text" name="SAdd" placeholder="عنوان الشارع">
                </li>
            </ul>

            <ul class="giylou">
                <li class="retu1">رقم الهاتف</li>
                <li class="retu2">
                    <input type="text" name="Pnum1" maxlength="4" size="4" placeholder="xxxx">-
                    <input type="text" name="Pnum2" maxlength="4" size="4" placeholder="xxxx">-
                    <input type="text" name="Pnum3" maxlength="4" size="4" placeholder="xxxx">
                </li>
            </ul>

            <ul class="giylou">
                <li class="retu1">عنوان البريد</li>
                <li class="retu2">
                    <input type="text" name="MAdd1" size="10" maxlength="20" pattern="^[a-zA-Z0-9!$*.=^`|~#%'+\/?_{}-]+" placeholder="info">@
                    <input type="text" name="MAdd2" size="12" pattern="([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,4}$" placeholder="example.com">
                </li>
            </ul>

            <ul class="giylou">
                <li class="retu1">أعرف</li>
                <li class="retu2">
                    <label><input type="checkbox" name="know_one" value="مجلة">مجلة</label>
                    <label><input type="checkbox" name="know_two" value="جريدة">جريدة</label>
                </li>
            </ul>

            <ul class="giylou">
                <li class="retu1">الفئة</li>
                <li class="retu2">
                    <select name="category">
                    <option value="طعام">طعام</option>
                    <option value="ملابس">ملابس</option>
                    <option value="منزل">منزل</option>
                    </select>
                </li>
            </ul>

            <ul class="giylou">
                <li class="retu1">سؤال</li>
            </ul>

            <ul class="giylou">
                <li class="retu1"></li>
                <li class="retu2">
                    <textarea maxlength="200" name="question"></textarea>
                </li>
            </ul>
            <ul class="giylou">
                <li class="retuB">
                    <input type="submit" value="التحقق من">
                    <input type="reset" value="إعادة تعيين">
                </li>
            </ul>
        </form>
    </div>
    <div id="di">
        <a href="Management_screen.php">شاشة إدارة</a>
    </div>
</body>
</html>

<!--
onclick="isRegHan(this.form.txt)"

<script type="text/javascript">
    function isRegHan(obj){
        str=obj.value;
        var tmp=str.match(/[0-9a-zA-Z\+\-\/\*\,\. ]+/g);
        if (tmp!=str){
            alert("半角文字以外が含まれています");
            history.back();
            return false;
        }else{
            alert("半角文字のみです");
            return true;
        }
    }
</script>
-->
