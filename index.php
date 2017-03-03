<?php

    header("Content-type:text/html;charset=utf-8");  //防乱码

    $usname = $_POST["usname"];
    $psword = $_POST["psword"];
    $mphone = $_POST["mphone"];  //获取数据
    $tpsword = "$mphone" . "$psword";  //获得密码
    $dinfo = "mysql:host=localhost;dbname=homeworkzhihu";
    $sql = new PDO($dinfo,'root','');  //连接数据库

    if($usname == ""){  //登录
        $login = $sql -> prepare("select mphone from user where mphone='$mphone'");
        $login -> execute();
        $num = $login -> rowCount();  //检索用户

        if($num == 0){  //判断用户是否存在
            echo "用户不存在";
        }
        else{  
            $tlogin = $sql -> prepare("select tpsword from user where tpsword='$tpsword'");
            $tlogin -> execute();
            $tnum = $tlogin -> rowCount();  //检索密码

            if($tnum == 1){  //判断密码正误
                echo "欢迎";
            }
            else{
                echo "密码错误";
            };
        };
    }

    else{  //注册
        $signin = $sql -> prepare("insert into user(usname,tpsword,mphone) value('$usname','$tpsword','$mphone')");
        $signin -> execute();  //保存数据

        $test = $sql ->prepare("select mphone from user where mphone='$mphone'");
        $test -> execute();
        $tsnum = $test -> rowCount(); //检索用户

        if ($tsnum == 1) {  //检查错误
            echo "注册成功";
        }
        else{
            echo "注册失败";
        };
    };

    setcookie("lous","$tpsword",time() + 60 * 60 * 24);
    $tlous = $_COOKIE["lous"]; //产生用户特征

?>