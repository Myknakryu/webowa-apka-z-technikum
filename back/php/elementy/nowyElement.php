<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_GET['ele']) && isset($_GET['prod']) && isset($_GET['kat']) && isset($_GET['gwa'])) {
    print "ok";
    $gwarancja = $_GET['gwa'];
    $nazwa = $_GET['ele'];
    $kategoria = $_GET['kat'];
    $producent = $_GET['prod'];
    $zap = "select * from pomieszczenia where nazwa_sali='" . $pomieszczenie . "' and nr_sali='" . $kod . ";";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 0) {
        $zap = "INSERT INTO `inwentarz` (`gwarancja`, `nazwa`, `kategoria_idkategoria`, `producent`)"
                . " VALUES ('".$gwarancja."','".$nazwa."', '".$kategoria."', '".$producent."');";
        mysqli_query($serw,$zap);
    } else {
        print 'nic';
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

