<?php
session_start();
if (!$_SESSION['ad']) {
    header('Location: /');
}
include "../vendor/connect.php";        $data = mysqli_query($connect, "SELECT * FROM users");
?>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>Recruiter</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../assets/css/main.css">
    </head>

    <body>
        <a href="res2.php">Резюмелер<a></br>
        <a href="vac2.php">Вакансиялар<a></br></br>
        <a href="out.php" class="logout">Шығу</a><hr>
        </br>
        <form action="delu.php" method="post">
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>login</th>
                <th>email</th>
                <th>opisanie</th>
                <th>number</th>
                <th>password</th>
                <th>type</th>
            </tr>
        <?php 

        echo 'Барлығы: '.mysqli_num_rows($data).' қолданушы';
        while ($row = mysqli_fetch_assoc($data)){
            echo "<tr><td>".$row["id"]."</td><td>".$row["full_name"]."</td><td>".$row["login"]."</td><td>".$row["email"]."</td><td>".$row["opisanie"]."</td><td>".$row["number"]."</td><td>".$row["password"]."</td><td>".$row["type"]."</td><td style='background-color: red;'><button class='delr' type='submit' name='deleteItem' value=".$row['id'].">удалить</button></td></tr>";
        }
        echo "</table>"; ?>
        </table></form>
    </body>
</html>