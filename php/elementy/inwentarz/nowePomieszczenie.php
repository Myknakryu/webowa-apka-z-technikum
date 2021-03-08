<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_POST['pom']) && isset($_POST['kod']) && $_SESSION['upraw']=='1') {

    
    $kod = $_POST['kod'];
    $pomieszczenie = $_POST['pom'];
    $zap = "select * from pomieszczenia where nazwa_sali='" . $pomieszczenie . "' and nr_sali='" . $kod . "';";
    $zapytanie = mysqli_query($serw, $zap);

echo mysqli_num_rows($zapytanie);
    if (mysqli_num_rows($zapytanie) == 0) {
        $zap = "INSERT INTO `pomieszczenia` (`id`, `userzy_iduserzy`, `nazwa_sali`, `nr_sali`, `klima`)"
                . " VALUES (NULL, 1, '".$pomieszczenie."', '".$kod."', 0);";
        mysqli_query($serw,$zap);
        echo json_encode('dodano');
    } else {
        echo json_encode('nic');
    }
}

