<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_GET['pom']) && isset($_GET['inw'])&& isset($_GET['ilo'])) {
    print "ok";
    $pomieszczenie = $_GET['pom'];
    $przedmiot = $_GET['inw'];
    $ilosc = $_GET['ilo'];
    $zap = "select * from pomieszczenia_has_inwentarz "
            . "where pomieszczenia_id='" . $pomieszczenie . "' and inwentarz_idprzedmioty = '" . $przedmiot . "';";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 0) {
        $zap = "INSERT INTO `pomieszczenia_has_inwentarz` (`pomieszczenia_id`, `inwentarz_idprzedmioty`, `ilosc`)"
                . " VALUES ('" . $pomieszczenie . "', '" . $przedmiot . "', '".$ilosc."');";
        mysqli_query($serw, $zap);
    } else {
        print 'nic';
    }
}
