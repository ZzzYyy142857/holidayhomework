<?php

    header("Content-type:text/html;charset=utf-8");
    
    $aagree = $_POST["anum"];
    $dinfo = "mysql:host=localhost;dbname=homeworkzhihu";
    $sql = new PDO($dinfo,'root','');  //连接数据库

?>