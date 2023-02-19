<?php
include_once("connect.php");
try{
    $id = $_POST['id'];
    $question = $_POST['question'];
    $optionA = $_POST['optionA'];
    $optionB = $_POST['optionB'];
    $optionC = $_POST['optionC'];
    $optionD = $_POST['optionD'];
    $answer = $_POST['answer'];
    
    $sql = "UPDATE `tbl_question` SET `question`='$question',`option_a`='$optionA',`option_b`='$optionB',`option_c`='$optionC',`option_d`='$optionD',`answer`='$answer' WHERE id = '$id'";
    if($conn->query($sql) == true){
        echo "Sửa câu hỏi thành công";
    } else {
        echo "Sửa câu hỏi không thành công";
    }
} catch(Exception $e) {
    echo "Lỗi ngoại lệ!".$e;
}
