
<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");

$posiadane = false;
$zap = "SELECT * FROM `pomieszczenia` where id in (select pomieszczenia_id from pomieszczenia_has_inwentarz where id=".$_POST['ele'].");";
                $zapytanie = mysqli_query($serw, $zap);
                $stuff =mysqli_fetch_assoc($zapytanie);
                if($stuff['userzy_iduserzy']==$_SESSION['id']||$_SESSION['upraw']=='1')
                    $posiadane=true;

if (isset($_POST['ele']) && $posiadane) {

    $element = $_POST['ele'];
    $zap = "select * from pomieszczenia_has_inwentarz where id='" . $element . "';";
    
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 1) {
        $wynik = mysqli_fetch_assoc($zapytanie);
        $pomieszczenie = $wynik['pomieszczenia_id'];
        $przedmiot = $wynik['inwentarz_idprzedmioty'];
        $login = $_SESSION['id'];
        $zap = "DELETE FROM pomieszczenia_has_inwentarz where id=".$element.";"; 
        mysqli_query($serw,$zap);
        echo json_encode('dodano');
        $zap= "insert into operacje (operacja,pomieszczenie,przedmiot, uzytkownik) values ('Usuniecie', $pomieszczenie, $przedmiot, $login)";
        mysqli_query($serw,$zap);
    } else {
        echo json_encode('nic');
    }
}


