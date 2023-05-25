<?php
session_start();
$id = $_POST['id'];
require_once 'connect.php';
mysqli_query($connect,"DELETE FROM vac WHERE id = '$id'");
header('Location: ../profile.php');
?>