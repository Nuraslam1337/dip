<?php
session_start();
unset($_SESSION['ad']);
header('Location: ../index.php');