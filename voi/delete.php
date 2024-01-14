<?php
require_once 'connect.php';

$id = $_GET['id'];
$connect->query("delete FROM students WHERE students.id = '$id'");

header('Location: http://localhost/voi/students.php');

