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
    <title>Түйіндеме ашу</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="body2">

    <!-- Профиль -->

    <form action="vendor/res.php" method="POST" enctype="multipart/form-data">
        <h1>Түйіндеме ашу</h1>
        </br>
        <label>Кәсіп:</label>
        <input type="text" name="prof">
        </br>
        <label>Қалаулы еңбек ақы:</label>
        <input type="number" name="sal">
        </br>
        <label><strong>Адрес:</strong></label>
        <input type="text" name="adres">
        </br>
        <label>Email:</label>
        <input type="email" name="email">
        </br>
        <label><strong>Номер:</strong></label>
        <input type="tel" name="number">
        </br>
        <label>Тәжірибе:</label>
        <input type="text" name="opt">
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
        <textarea rows="10" name="des"></textarea>
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