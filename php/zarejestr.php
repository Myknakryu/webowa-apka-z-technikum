<?php
session_start();
$log = $_POST['login'];
$haslo = $_POST['haslo'];
$haslo2 = $_POST['haslo2'];
$serw = mysqli_connect('localhost','root','zaq1@WSX','baza');
$zap = "select * from userzy where login='".$log."' limit 1";
$sprawdz = mysqli_query($serw,$zap);
if(mysqli_num_rows($sprawdz)>0){
    $_SESSION['loginistnieje'] = 1;
    header('Location: rejestr.php');
}
else{
if($haslo===$haslo2){
    $zap2 = "insert into userzy values(null,null,'".$log."','".md5($haslo)."',current_timestamp(),current_timestamp())";
    mysqli_query($serw,$zap2);
    echo "Wyslano twoja prosbe rejestracji do administratora.";
}
else{
    $_SESSION['roznehasla'] = 'zle_has';
    header('Location: rejestr.php');
}
}
?>