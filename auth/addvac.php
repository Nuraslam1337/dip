<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <title>Вакансия ашу</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="body2">

    <!-- Профиль -->

    <form action="vendor/vac.php" method="post" enctype="multipart/form-data">
        <h1>Вакансия ашу</h1>
        </br>
        <label>Лауазым:</label>
        <input type="text" name="jname">
        </br>
        <label>Еңбек ақы:</label>
        <input type="number" name="salary">
        </br>
        <label>Адрес:</label>
        <input type="text" name="adrs">
        </br>
        <label>Номер:</label>
        <input type="tel" name="number">
        <label>Параметрлер:</label>
        </br><div style="direction: row; align-self: center;">
        <select name="graf">
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
        <textarea rows="10" name="dscrptn"></textarea>
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
        <a href="main.php">Артқа</a>
    </form>

</body>
</html>