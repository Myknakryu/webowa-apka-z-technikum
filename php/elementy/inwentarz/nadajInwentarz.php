<?php
session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");

if (isset($_POST['pom']) && isset($_POST['usr'])&&$_SESSION['upraw']=='1')
{
    $pom = $_POST['pom'];
    $usr = $_POST['usr'];
    $zap = "UPDATE `pomieszczenia` SET `userzy_iduserzy` = '$usr' WHERE `pomieszczenia`.`id` = $pom; ";
    mysqli_query($serw,$zap);
    echo json_encode('dodano');
}
else
{
    echo "błąd";
}