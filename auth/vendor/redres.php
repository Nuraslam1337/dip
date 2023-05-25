<?php

    session_start();
    require_once 'connect.php';
    $prof = trim($_POST['prof']);
    $sal = $_POST['sal'];
    $adres = $_POST['adres'];
    $number = $_POST['number'];
    $des = $_POST['des'];
    $opt = trim($_POST['opt']);
    $email = $_POST['email'];
    $educ = $_POST['educ'];
    $zan = $_POST['zan'];
    $graf = $_POST['graf'];

    $id = $_POST['id']; 
        $query ="UPDATE res SET prof = '$prof', sal = '$sal', adres = '$adres', number = '$number', des = '$des', opt = '$opt', email = '$email', educ = '$educ', zan = '$zan', graf = '$graf' WHERE res.id = $id";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $num_rows = mysqli_num_rows($result);        
        
        if($result)
        {
           $_SESSION['message'] = 'Деректер өзгертілді';
        }
        else{$_SESSION['message'] = 'Деректер өзгертілмеді';} 
        
        header('Location: ../profile.php');
   
?>