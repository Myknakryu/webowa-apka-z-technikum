<?php


session_start();
if($_SESSION['upraw']=="1"){
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_POST['usr']) && isset($_POST['upr'])) {
    $userzy = $_POST['usr'];
    $uprawnienia = $_POST['upr'];
    
    foreach($userzy as $val => $usr)
    {
        $zap = "UPDATE `userzy` SET `uprawnienia_id` = $uprawnienia[$val] WHERE iduserzy = $usr;";
        mysqli_query($serw, $zap);
    }
    echo json_encode("dodano");
}
else
echo json_encode("nic");
}
mysqli_close($link);