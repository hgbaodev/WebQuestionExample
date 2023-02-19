<?php
include_once("connect.php");
$id = $_GET['id'];
$sql = "Select * from tbl_question where id = '$id'";
$stmt = $conn->prepare($sql);
$stmt->execute(); 
$question = $stmt->fetch();
echo json_encode($question);
