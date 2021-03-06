<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_GET['kat'])) {
    print "ok";
    $kategoria = $_GET['kat'];
    $zap = "select * from kategoria where nazwa='" . $kategoria . "';";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 0) {
        $zap = "INSERT INTO `kategoria` (`idkategoria`, `nazwa`)"
                . " VALUES (NULL, '".$kategoria."');";
        mysqli_query($serw,$zap);
    } else {
        print 'nic';
    }
}
