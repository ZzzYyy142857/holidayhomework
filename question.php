<?php

    header("Content-type:text/html;charset=utf-8");
    
    $ques = $_POST["ques"];
    $quest = $_POST["quest"];
    $dinfo = "mysql:host=localhost;dbname=homeworkzhihu";
    $sql = new PDO($dinfo,'root','');  //连接数据库

    $quesid = $sql -> prepare("select * from question where question");
    $quesid ->execute();
    $questid_1 = $quesid -> rowcount(); //获取问题编号

    $tques_1 = "$questid_1" . "&" . "$ques"; //生成问题
    $usname_1 = $_COOKIE["lous"];
    $tques_2 = "$tques_1" . "&" . "$usname_1"; //用户+问题

    $addques = $sql -> prepare("insert into question(question) value('$tques_2')");
    $addques -> execute(); //输入问题
    
    $questid = "$questid_1" . "&";
    $putques = $sql -> query("select tpsword from user where tpsword='$tpsword'");

?>