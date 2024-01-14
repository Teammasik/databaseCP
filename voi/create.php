<?php
require_once 'connect.php';

$sName = $_POST['studentName'];
$sSurname = $_POST['studentSurname'];
$sGroup = $_POST['studentGroup'];
$uTime = $_POST['uTime'];
$uDate = $_POST['uDate'];
$points = $_POST['points'];
$test = $_POST['test'];


$connect->query("call InsertStudentAndWalkthrough('$sSurname','$sName','$sGroup','$uTime', '$uDate', '$points', '$test')");

// $check_val = $connect->query("select * from students where userName = '$sName' and userSurname = '$sSurname' and userGroup = '$sGroup'");
// $connect->next_result();
// $row = mysqli_fetch_array($check_val);
// if (!$row) {
//   $connect->query("insert into students (id, userName, userSurname, userGroup) values (null,'$sName',  '$sSurname', '$sGroup')");
//   $connect->next_result();

//   $row = mysqli_fetch_array($connect->query("select * from students where userName = '$sName' and userSurname = '$sSurname' and userGroup = '$sGroup'"));
//   $connect->next_result();

//   $connect->query("
//   INSERT INTO `walkthrough` (`id`, `student_id`,  `uTime`, `uDate`, `points`, `test`) VALUES (NULL, '$row[0]',  '$uTime', '$uDate', '$points', '$test');
//     "); 
// }
// else{
//   $connect->query("
//   INSERT INTO `walkthrough` (`id`, `student_id`,  `uTime`, `uDate`, `points`, `test`) VALUES (NULL, '$row[0]',  '$uTime', '$uDate', '$points', '$test');
//     "); 
// }   

header('Location: ./test.php');