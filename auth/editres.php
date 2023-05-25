<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
$name = $_POST['name'];
$sal = $_POST['sal'];
$adres = $_POST['adres'];
$des = $_POST['des'];
$number = $_POST['number'];
$id = $_POST['id'];
$userId = $_POST['user_id'];
$email = $_POST['email'];
$educ = $_POST['educ'];
$prof = $_POST['prof'];
$opt = $_POST['opt'];

$port = $_POST['port'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <title>Түйіндеме өзгерту</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="body2">

    <!-- Профиль -->

    <form action="vendor/redres.php" method="POST" ><input type="hidden" name="id" value="<?php echo $id; ?>">
        <h1>Түйіндеме өзгерту</h1>
        </br>
       
        <label>Кәсіп:</label>
        <input type="text" name="prof" value="<?php echo $prof; ?>">
        </br>
        <label>Қалаулы еңбек ақы:</label>
        <input type="number" name="sal" value="<?php echo $sal; ?>">
        </br>
        <label><strong>Адрес:</strong></label>
        <input type="text" name="adres" value="<?php echo $adres; ?>">
        </br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
        </br>
        <label><strong>Номер:</strong></label>
        <input type="tel" name="number" value="<?php echo $number; ?>">
        </br>
        <label>Тәжірибе:</label>
        <input type="text" name="opt" value="<?php echo $opt; ?>">
        </br>
        <label>Параметрлер:</label>
        </br><div style="direction: row; align-self: center;">
        <select name="educ">
        <option value="Среднее">Среднее</option>
        <option value="Среднее специальное">Среднее специальное</option>
        <option value="Бакалавр">Бакалавр</option>
        <option value="Магистр">Магистр</option>
        <option value="Высшее">Высшее</option>
        <option value="Кандидат наук">Кандидат наук</option>
        <option value="Доктор наук">Доктор наук</option>
        </select>
        &nbsp;
        <input type = "text" name = "zan" placeholder="Оқу орны">
        </div>
        </br>
        <label>Сипаттама:</label>
        <textarea rows="10" name="des"><?php echo $des; ?></textarea>
        </br>

        <button type="submit">Растау</button>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        </br>
        <hr>
        </br>
        <a href="profile.php">Артқа</a>
    </form>

</body>
</html>