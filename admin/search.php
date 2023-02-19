<?php
        include_once("connect.php");
        $page = $_GET['page'];
        $content = $_GET['content'];
        $sql = $conn->prepare("SELECT * FROM tbl_question where question like '%$content%' limit 5 offset ".($page-1)*5);
        $sql->execute();
        $index = 1;
        $data = '';
        while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
            $question = $result['question'];
            $id = $result['id'];
            $data .= '<tr id = '.$id.'>
            <td>'.$index++.'</td>
            <td class="text-primary">'.$question.'</td>
            <td class="text-end">
              <input class="btn btn-xs btn-info" type="button" value="Xem" name="view" data-bs-toggle="modal" data-bs-target="#model_question">
              <input class="btn btn-xs btn-warning" type="button" value="Sửa" name="update" data-bs-toggle="modal" data-bs-target="#model_question">
              <input class="btn btn-xs btn-danger" type="button" value="Xóa" name="delete">
            </td>
          </tr>';
        }
        echo $data;
