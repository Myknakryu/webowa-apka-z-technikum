
<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_POST['kat'])&&$_SESSION['upraw']=='1') {
    
    $kategoria = $_POST['kat'];
    $zap = "select * from kategoria where idkategoria='" . $kategoria . "';";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 1) {
        $zap = "DELETE FROM kategoria where idkategoria=".$kategoria.";"; 
        mysqli_query($serw,$zap);
        echo json_encode('dodano');
    } else {
        echo json_encode('nic');
    }
}


