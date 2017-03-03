<?php

    header("Content-type:text/html;charset=utf-8");
    
    $ques = $_POST["ques"];
    $des = $_POST["des"];
    $dinfo = "mysql:host=localhost;dbname=homeworkzhihu";
    $sql = new PDO($dinfo,'root','');  //连接数据库

    $quesid = $sql -> prepare("select id from question");
    $quesid -> execute();
    $questid = $quesid -> rowcount(); //获取问题id

    $usid = $_COOKIE["lous"]; 
    $kp = $sql -> prepare("insert into question(id,user,question,description) value('$questid','$usid','$ques','$des')");
    $kp -> execute(); //保存问题id,问题,提问用户,问题描述

?>