<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");

$posiadane = false;
$zap = "select * from pomieszczenia where id=".$_POST['pom'].";";
                $zapytanie = mysqli_query($serw, $zap);
                $stuff =mysqli_fetch_assoc($zapytanie);
                if($stuff['userzy_iduserzy']==$_SESSION['id']||$_SESSION['upraw']=='1')
                    $posiadane=true;


if (isset($_POST['pom']) && isset($_POST['inw'])&& isset($_POST['ilo'])&& $posiadane) {
    $pomieszczenie = $_POST['pom'];
    $przedmiot = $_POST['inw'];
    $ilosc = $_POST['ilo'];
    $zap = "select * from pomieszczenia_has_inwentarz "
            . "where pomieszczenia_id='" . $pomieszczenie . "' and inwentarz_idprzedmioty = '" . $przedmiot . "';";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 0) {
        $login = $_SESSION['id'];
        
        $zap = "INSERT INTO `pomieszczenia_has_inwentarz` (`pomieszczenia_id`, `inwentarz_idprzedmioty`, `ilosc`)"
                . " VALUES ('" . $pomieszczenie . "', '" . $przedmiot . "', '".$ilosc."');";
        mysqli_query($serw, $zap);
        echo json_encode('dodano');
        $zap= "insert into operacje (operacja,pomieszczenie,iloscPo,przedmiot, uzytkownik) values ('Dodanie', $pomieszczenie, $ilosc, $przedmiot, $login)";
        mysqli_query($serw, $zap);
    } else {
        echo json_encode('nic');
    }
}