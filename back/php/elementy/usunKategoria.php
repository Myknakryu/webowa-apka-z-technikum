
<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_GET['kat'])) {
    print "ok";
    $kategoria = $_GET['kat'];
    $zap = "select * from kategoria where idkategoria='" . $kategoria . "';";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 1) {
        $zap = "DELETE FROM kategoria where idkategoria=".$kategoria.";"; 
        mysqli_query($serw,$zap);
    } else {
        print 'nic';
    }
}


