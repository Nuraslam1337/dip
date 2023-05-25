<?php
$connect = mysqli_connect('localhost', 'root', '', 'test');

$delete = $_POST['deleteItem'];
    mysqli_query($connect, "DELETE FROM vac WHERE id = '$delete'");
    header('Location: admin.php');
?>