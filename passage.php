<?php

    header("Content-type:text/html;charset=utf-8");  //防乱码

    $title = $_POST["title"];
    $passage = $_POST["passage"];
    $dinfo = "mysql:host=localhost;dbname=homeworkzhihu";
    $sql = new PDO($dinfo,'root','');  //连接数据库

    $passid = $sql -> prepare("select id from passage");
    $passid -> execute();
    $passtid = $passid -> rowcount(); //获取文章id

    $usid = $_COOKIE["lous"]; 
    $kp = $sql -> prepare("insert into passage(id,title,writer,passage) value('$passtid','$title','$usid','$passage')");
    $kp -> execute(); //保存文章id,标题,作者,文章内容

?>