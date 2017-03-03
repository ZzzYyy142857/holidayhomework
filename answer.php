<?php

　　header("Content-type:text/html;charset=utf-8");  //防乱码

    $dinfo = "mysql:host=localhost;dbname=homeworkzhihu";
    $sql = new PDO($dinfo,'root','');  //连接数据库

    $seausname = $sql -> prepare("select usname from user where tpsword='$usid'");
    $seausname -> execute();
    $gusname = $seausname -> fetch();
    $usname = $gusname['usname']; //获取用户名

?>