<?php
include_once("connect.php");
try{
    $id = $_POST['id'];
    $sql = "DELETE FROM `tbl_question` WHERE id = '$id'";
    if($conn->query($sql) == true){
        echo "Xóa câu hỏi thành công";
    } else {
        echo "Xóa câu hỏi không thành công";
    }
} catch(Exception $e) {
    echo "Lỗi ngoại lệ!".$e;
}