<?php
include_once("connect.php");
try{
    $question = $_POST['question'];
    $optionA = $_POST['optionA'];
    $optionB = $_POST['optionB'];
    $optionC = $_POST['optionC'];
    $optionD = $_POST['optionD'];
    $answer = $_POST['answer'];
    
    $sql = "INSERT INTO `tbl_question`(`question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES ('$question','$optionA','$optionB','$optionC','$optionD','$answer')";
    if($conn->query($sql) == true){
        echo "Thêm câu hỏi thành công";
    } else {
        echo "Thêm câu hỏi không thành công";
    }
} catch(Exception $e) {
    echo "Lỗi ngoại lệ!".$e;
}
