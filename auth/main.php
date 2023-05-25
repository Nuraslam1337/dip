<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
include "vendor/connect.php";


?>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>Recruiter</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <header style="background-color: green;">
        <nav class = "mainav" style="font-size:25;">

            <a href="profile.php">Профиль</a><hr><a style="color: #ff3426;" href="vendor/logout.php">Шығу</a>

        </nav>

    </header>
    <body>
        <hr>
        <?php if ('ul' == $_SESSION['user']['type']) { ?>
        <div class = "container"> <div class="rowhead"><h1>Түйіндемелер</h1></div>
            <ul>

            <?php $data = mysqli_query($connect, "SELECT * FROM res");
            while ($vacs = mysqli_fetch_assoc($data))
            { ?>

            <li>
                <div class="bottom"><?php echo $vacs['prof']; ?></div>
                <?php if ($vacs['sal'] !== null) { ?> <div class="bottom2"><?php echo $vacs['sal']; ?> KZT</div><?php } ?>
                <?php if ($vacs['opt'] !== null) {$opt = $vacs['opt']; } else {$opt='Нет опыта';}?> <div class="bottom2"><?php echo $opt; ?></div>
                <?php if ($vacs['number'] !== null) { ?> <div class="bottom2">+<?php echo $vacs['number']; ?></div> <?php } ?>
                <div class="bottom3"><div class="block2"><?php echo '<label>'.$vacs['zan'].'</label><label>'.$vacs['educ'].'</label>';?></div></div>
                <textarea readonly><?php echo $vacs['des']; ?></textarea>

            </li>

            <? }
            ?>
            </ul>
        </div>
        <? } else{  ?>
        <div class = "container"> <div class="rowhead"><h1>Вакансиялар</h1></div>
            <ul>
                <?php
                if(isset($_POST['ser'])){$ser = $_POST['ser']; $que = "SELECT * FROM vac WHERE jname LIKE '%$ser%' OR dscrptn LIKE '%$ser%' OR graf LIKE '%$ser%' OR zan LIKE '%$ser%'";}
                $que="SELECT * FROM vac";
                $data = mysqli_query($connect, $que);
            while ($vacs = mysqli_fetch_assoc($data))
            { ?>

            <li>
                <div class="bottom"><?php echo $vacs['jname']; ?></div>
                <?php if ($vacs['salary'] !== null) { ?> <div class="bottom"><?php echo $vacs['salary']; ?> KZT</div> <?php } ?>

                <?php if ($vacs['number'] !== null) { ?> <div class="bottom2">+<?php echo $vacs['number']; ?></div> <?php } ?>
                <div class="bottom3"><div class="block2"><?php echo '<label>Занятость: '.$vacs['zan'].'</label><label>Образование: '.$vacs['educ'].'</label><label>График: '.$vacs['graf'].'</label>';?></div></div>
                <textarea readonly><?php echo $vacs['dscrptn']; ?></textarea>
            </li>

            <? }
            ?>

            </ul>
        </div> 
        <? } ?>
        <footer>
            Космонавтұлы Нұраслам </br>
            +77054658 </br>
            adf@fgks.som
        </footer>
    </body>
</html>