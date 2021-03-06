<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");


if (isset($_POST['inw'])&& isset($_POST['ilo'])) {
    $przedmiot = $_POST['inw'];
    $ilosc = $_POST['ilo'];
    $user = $_SESSION['id'];
    foreach($przedmiot as $index => $item)
    {
        $zap = "SELECT ilosc from pomieszczenia_has_inwentarz where id = $item";
        $poprzedniaIlosc = mysqli_fetch_assoc(mysqli_query($serw, $zap))['ilosc'];
        $zap = "SELECT pomieszczenia_id pom from pomieszczenia_has_inwentarz where id = $item";
        $pomieszczenie = mysqli_fetch_assoc(mysqli_query($serw, $zap))['pom'];
        
        $zap = "SELECT inwentarz_idprzedmioty inw from pomieszczenia_has_inwentarz where id = $item";
        $element = mysqli_fetch_assoc(mysqli_query($serw, $zap))['inw'];
        $ammount = $ilosc[$index];
        $posiadane = true;
        $zap = "select * from pomieszczenia where id = "
                . "(SELECT pomieszczenia_id FROM `pomieszczenia_has_inwentarz` where id=$user)";
                $zapytanie = mysqli_query($serw, $zap);
                $stuff =mysqli_fetch_assoc($zapytanie);
                
                if($stuff['userzy_iduserzy']==$_SESSION['id']||$_SESSION['upraw']=='1')
                    $posiadane=true;
                if($posiadane)
                {
                   
                    
                    $zap = "UPDATE `pomieszczenia_has_inwentarz` SET `ilosc` = '$ammount' WHERE `pomieszczenia_has_inwentarz`.`id` = $item";
                   mysqli_query($serw, $zap);
                   $zap = $zap= "insert into operacje (operacja,pomieszczenie, iloscPrzed, iloscPo,przedmiot, uzytkownik) "
                           . "values ('Zmiana', $pomieszczenie, $poprzedniaIlosc, $ammount, $element, $user)";
                   
                   mysqli_query($serw, $zap);
                   
                }   
        
    }
    echo json_encode('dodano');
    
}