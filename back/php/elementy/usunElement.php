
<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_GET['ele'])) {
    print "ok";
    $element = $_GET['ele'];
    $zap = "select * from inwentarz where idprzedmioty='" . $element . "';";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 1) {
        $zap = "DELETE FROM inwentarz where idprzedmioty=".$element.";"; 
        mysqli_query($serw,$zap);
    } else {
        print 'nic';
    }
}


