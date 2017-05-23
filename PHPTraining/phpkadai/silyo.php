<!-- 変数に値が渡っているかチェック -->
<?php
    //sname(姓)とnname(名)に値が入っているか判定
    if(isset($_POST['sname']) || isset($_POST['nname'])){
        $sname = htmlspecialchars($_POST["sname"],ENT_NOQUOTES,"UTF-8");
        $nname = htmlspecialchars($_POST['nname'],ENT_NOQUOTES,"UTF-8");
        //値は入っていてかつ、値が空白かどうか判定
        if($sname === "" || mb_ereg_match("\s",$sname) || $nname === "" || mb_ereg_match("\s",$nname)){
            //空白ならアラートを呼び出す
            al();
        }else{
            //空白でなければmail(アカウント)とmaildomain(ドメイン)に値が入っているか判定
            if(isset($_POST['mail']) || isset($_POST['maildomain'])){
                $mail = htmlspecialchars($_POST['mail'],ENT_NOQUOTES,"UTF-8");
                $domain = htmlspecialchars($_POST['maildomain'],ENT_NOQUOTES,"UTF-8");
                //値は入っていてかつ、値が空白かどうか判定
                if($mail === "" || mb_ereg_match("\s",$mail) || $domain === "" || mb_ereg_match("\s",$domain)){
                    //空白ならアラートを呼び出す
                    al();
                }else{
                    //空白でなければden1,2,3に値が入っているか判定
                    if(isset($_POST['den1']) || isset($_POST['den2']) || isset($_POST['den3'])){
                        $den1 = htmlspecialchars($_POST['den1'],ENT_NOQUOTES,"UTF-8");
                        $den2 = htmlspecialchars($_POST['den2'],ENT_NOQUOTES,"UTF-8");
                        $den3 = htmlspecialchars($_POST['den3'],ENT_NOQUOTES,"UTF-8");
                        //値は入っていてかつ、値が空白かどうか判定;
                        if($den1 === "" || mb_ereg_match("\s",$den1) || $den2 === "" || mb_ereg_match("\s",$den2) || $den3 === "" || mb_ereg_match("\s",$den3)){
                            //空白ならアラートを呼び出す
                            al();
                        }else{
                            //空白でなければ数字か判定
                            if(!ctype_digit($den1) || !ctype_digit($den2) || !ctype_digit($den3)){
                                //数字でなければアラート
                                echo '<script type="text/javascript">alert("電話番号は半角数字で入力してください。");history.go(-1);</script>';
                            }else{
                                //数字であれば値をセッションに保持
                                session_start();
                                $_SESSION['nname'] = $nname;
                                $_SESSION['sname'] = $sname;
                                $_SESSION['sei'] = $_POST['sei'];
                                $den = $den1.$den2;
                                $_SESSION['den'] =  $den.$den3;
                                $_SESSION['mailadd'] = $mail."@".$domain;
                                $_SESSION['zilyuusilyo'] = $_POST['zilyuusilyo'];
                                $_SESSION['taku_one'] = $_POST['taku_one'];
                                $_SESSION['taku_two' ]= $_POST['taku_two'];
                                $_SESSION['kate'] = $_POST['kate'];
                                $_SESSION['nai'] = $_POST['nai'];
                                header("Location: kakunin.php");
                            }//den1,2,3の数字チェック
                        }//den1,2,3の空白チェック
                    }//den1,2,3
                }//mail,maildomainの空白チェック
            }//mail,maildomain
        }//sname,nnameの空白チェック
    }//sname,nname
    function al(){
        //アラートを呼び出し、処理前に戻る
        echo '<script type="text/javascript">alert("必須項目に未入力があります。");history.go(-1);</script>';
    }
?>
