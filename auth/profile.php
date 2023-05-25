<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

require_once "vendor/connect.php";
$id = $_SESSION['user']['id'];
$data = mysqli_query($connect, "SELECT * FROM vac WHERE user_id = '$id'");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="body1" >
<div style="width: 33%;"><a href="main.php" class="manb">Басты бет</a></div>
    <!-- Профиль -->
    <form style="width: 30%; align-self: auto;">
        <?if ($_SESSION['user']['avatar']){?><img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt=""><?}?>

        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name']; ?></h2>

        <div class="block">
            <label>Email:</label>&nbsp;<?= $_SESSION['user']['email'] ?>
        </div>
    </br>
    <div class="block">
        <label>Логин:</label>&nbsp;<?= $_SESSION['user']['login'] ?>
    </div>
        </br>
        <div class="block">
        <label>Нөмір:</label>&nbsp;<?= $_SESSION['user']['number'] ?>
    </div>

    <?if ($_SESSION['user']['bin']){?></br><div class="block"><label>БИН:</label>&nbsp;<?= $_SESSION['user']['bin'] ?></div><?}?>
    <?if ($_SESSION['user']['bik']){?></br><div class="block"><label>БИН:</label>&nbsp;<?= $_SESSION['user']['bik'] ?></div><?}?>
    <?if ($_SESSION['user']['iik']){?></br><div class="block"><label>БИН:</label>&nbsp;<?= $_SESSION['user']['iik'] ?></div><?}?>

        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        </br><hr>
        <div class="block2">
        <a href="redact.php" class="edit3" title='Профиль параметрлері'>Өзгерту</a>
        <a href="vendor/logout.php" class="logout" title='Профильден шығу' style="border: solid #ffa908;">Шығу</a>
        </div>
    </form>

    <?php if ('ul' == $_SESSION['user']['type']) {  ?>
        <div style="width: 33%; " class="container">
            <div class="rowhead"><h1>Ашық вакансиялар</h1> <button title="Бос орын ашу" onclick = "window.location.href = 'addvac.php';" class = "addvacc">+</button></div>
            <ul >
                <? while ($vacs = mysqli_fetch_assoc($data)) { ?>
                    <form action ="editvac.php" method="POST" >
                        <input type="hidden" name="jname" value="<? echo $vacs['jname']; ?>">
                        <input type="hidden" name="salary" value="<? echo $vacs['salary']; ?>">
                        <input type="hidden" name="adrs" value="<? echo $vacs['adrs']; ?>">
                        <input type="hidden" name="dscrptn" value="<? echo $vacs['dscrptn']; ?>">
                        <input type="hidden" name="number" value="<? echo $vacs['number']; ?>">
                        <input type="hidden" name="id" value="<? echo $vacs['id']; ?>">

                        <li style="width: 300px">
                            <div class="bottom" style="font-size: 20px;">
                                <button title="Өзгерту" type="submit" class="edit"><></button>
                                <?php echo $vacs['jname']; ?>
                                <button formaction="vendor/deletevac.php" title="Жою" class="delete">-</button>
                            </div>
                            <?php if ($vacs['salary'] !== NULL) { ?> 
                                <div class="bottom2" style="font-size: 23px;">
                                <?php echo $vacs['salary']; ?> KZT</div> <?php } ?>

                            <?php if ($vacs['number'] !== null) { ?> <div class="bottom2">+<?php echo $vacs['number']; ?></div> <?php } ?><textarea readonly  ><?php echo $vacs['dscrptn']; ?></textarea>
                        </li>
                    </form>
                <?}?>
            </ul>
        </div>
    <? } elseif ('fl' == $_SESSION['user']['type']) { $data = mysqli_query($connect, "SELECT * FROM res WHERE user_id = $id"); ?>
        <div style="width: 30%;" class="container">
            <div class="rowhead"><h1>Менің түйіндемелерім</h1> <button title="Түйіндеме қосу" onclick = "window.location.href = 'addres.php';" class = "addvacc">+</button></div>
            <ul>
                <? while ($res = mysqli_fetch_assoc($data)) { ?>
                    <form action ="editres.php" method="POST">
                        <input type="hidden" name="name" value="<? echo $res['name']; ?>">
                        <input type="hidden" name="sal" value="<? echo $res['sal']; ?>">
                        <input type="hidden" name="adres" value="<? echo $res['adres']; ?>">
                        <input type="hidden" name="des" value="<? echo $res['des']; ?>">
                        <input type="hidden" name="number" value="<? echo $res['number']; ?>">
                        <input type="hidden" name="id" value="<? echo $res['id']; ?>">
                        <input type="hidden" name="user_id" value="<? echo $res['user_id']; ?>">
                        <input type="hidden" name="email" value="<? echo $res['email']; ?>">
                        <input type="hidden" name="educ" value="<? echo $res['educ']; ?>">
                        <input type="hidden" name="prof" value="<? echo $res['prof']; ?>">
                        <input type="hidden" name="opt" value="<? echo $res['opt']; ?>">
                        <input type="hidden" name="port" value="<? echo $res['port']; ?>">
                        <input type="hidden" name="zan" value="<? echo $res['zan']; ?>">

                        <li style="width: 300px">
                            <div class="bottom" style="font-size: 20px;">
                                <button title="Өзгерту" type="submit" class="edit"><></button>
                                <?php echo $res['prof']; ?>
                                <button formaction="vendor/deleteres.php" title="Жою" class="delete">-</button>
                            </div>
                            <?php if ($res['sal'] !== NULL) { ?> <div class="bottom2" style="font-size: 23px;"> <?php echo $res['sal']; ?> KZT</div> <?php } ?>

                            <?php if ($res['number'] !== null) { ?> <div class="bottom2">+<?php echo $res['number']; ?></div> <?php } ?>
                            <textarea readonly  ><?php echo $res['des']; ?></textarea>
                        </li>
                    </form>
                <?}?>
            </ul>
        </div>
    <?}?>

</body>
</html>