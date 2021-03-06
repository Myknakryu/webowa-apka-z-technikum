<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_POST['ele']) && isset($_POST['prod']) && isset($_POST['kat']) && isset($_POST['gwa'])&&$_SESSION['upraw']=='1') {
    $gwarancja = $_POST['gwa'];
    $nazwa = $_POST['ele'];
    $kategoria = $_POST['kat'];
    $producent = $_POST['prod'];
    $zap = "select * from pomieszczenia where nazwa_sali='" . $pomieszczenie . "' and nr_sali='" . $kod . ";";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 0) {
        $zap = "INSERT INTO `inwentarz` (`gwarancja`, `nazwa`, `kategoria_idkategoria`, `producent`)"
                . " VALUES ('".$gwarancja."','".$nazwa."', '".$kategoria."', '".$producent."');";
        mysqli_query($serw,$zap);
        echo json_encode('dodano');
    } else {
        echo json_encode('nic');
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

