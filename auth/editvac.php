<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
$jname = $_POST['jname'];
$salary = $_POST['salary'];
$adrs = $_POST['adrs'];
$dscrptn = $_POST['dscrptn'];
$number = $_POST['number'];
$educ = $_POST['educ'];
$id = $_POST['id'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <title>Вакансияны өзгерту</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="body2">

    <!-- Профиль -->

    <form action="vendor/redvac.php" method="POST">
        <h1>Вакансияны өзгерту</h1>
        </br>
        <label>Лауазым:</label>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="jname" value="<?php echo $jname; ?>">
        </br>
        <label>Еңбек ақы:</label>
        <input type="number" name="salary" value="<?php echo $salary; ?>">
        </br>
        <label>Адрес:</label>
        <input type="text" name="adrs" value="<?php echo $adrs; ?>">
        </br>
        <label>Номер:</label>
        <input type="tel" name="number" value="<?php echo $number; ?>">
        </br>
        <label>Параметрлер:</label>
        </br><div style="direction: row; align-self: center;">
        <select name="graf" >
        <option value="Полный день">Полный день</option>
        <option value="Гибкий график">Гибкий график</option>
        <option value="Сменный график">Сменный график</option>
        <option value="Удаленная работа">Удаленная работа</option>
        <option value="Вахта">Вахта</option>
        </select>
        &nbsp;<select name="educ">
        <option value="Среднее">Среднее</option>
        <option value="Среднее специальное">Среднее специальное</option>
        <option value="Бакалавр">Бакалавр</option>
        <option value="Магистр">Магистр</option>
        <option value="Высшее">Высшее</option>
        <option value="Кандидат наук">Кандидат наук</option>
        <option value="Доктор наук">Доктор наук</option>
        </select>
        &nbsp;
        <select name="zan">
        <option value="Полная занятость">Полная занятость</option>
        <option value="Частичная занятость">Частичная занятость</option>
        <option value="Проектная работа/разовое задание">Проектная работа/разовое задание</option>
        <option value="Волонтерство">Волонтерство</option>
        </select>
        </div>
        </br>
        <label>Сипаттама:</label>
        <textarea rows="10" name="dscrptn"><?php echo $dscrptn; ?></textarea>
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