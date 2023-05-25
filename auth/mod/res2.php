<?php
session_start();
if (!$_SESSION['ad']) {
    header('Location: /');
}
include "../vendor/connect.php";
?>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>Recruiter</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../assets/css/main.css">
    </head>

    <body>
        <a href="admin.php">Қолданушылар<a></br>
        <a href="vac2.php">Вакансиялар<a></br></br>
        <a href="out.php" class="logout">Шығу</a><hr>
        </br>
<form action="delr.php" method="post">
        <table>
            <tr>
                <th>id</th>
                <th>user_id</th>
                <th>name</th>
                <th>adres</th>
                <th>email</th>
                <th>number</th>
            </tr>
        <?php 
        $data = mysqli_query($connect, "SELECT * FROM res");
        echo 'Барлығы: '.mysqli_num_rows($data).' түйіндеме';
        while ($row = mysqli_fetch_assoc($data)){
            echo "<tr><td>".$row["id"]."</td><td>".$row["user_id"]."</td><td>".$row["name"]."</td><td>".$row["adres"]."</td><td>".$row["email"]."</td><td>".$row["number"]."</td><td style='background-color: red;'><button class='delr' type='submit' name='deleteItem' value=".$row['id'].">удалить</button></td></tr>";
        }
        echo "</table>"; ?>
        </table>
    </body>
</html>