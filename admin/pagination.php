<?php
        include_once("connect.php");
        $content = $_GET['content'];
        $sql = $conn->prepare("SELECT * FROM tbl_question where question like '%$content%'");
        $sql->execute();
        $count = $sql->rowCount();
        $data = $count%5==0?$count/5:floor($count/5)+1;
        echo $data;
