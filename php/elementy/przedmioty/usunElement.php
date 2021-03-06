
<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_POST['ele'])&&$_SESSION['upraw']=='1') {
    $element = $_POST['ele'];
       $zap = "select * from inwentarz where idprzedmioty='" . $element . "';";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 1) {
        $zap = "DELETE FROM inwentarz where idprzedmioty=".$element.";"; 
        mysqli_query($serw,$zap);
        echo json_encode('dodano');
    } else {
        echo json_encode('nic');
    }
}


