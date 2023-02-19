<?php
        setcookie('answer',"",time() - 1, "/");
        include_once("connect.php");
        $page = $_GET['page'];
        $content = $_GET['content'];
        $sql = $conn->prepare("SELECT * FROM tbl_question order by RAND() limit 5 ");
        $sql->execute();
        $index = 1;
        $data = '';
        $resultecho = $sql->fetchAll(PDO::FETCH_ASSOC);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        $cucki = [];

        foreach ($result as $row) {
                $cucki[$row['id']] = -1;
        }

        setcookie('answer',json_encode($cucki),time() + 120, "/");
        echo json_encode($resultecho);

        
        