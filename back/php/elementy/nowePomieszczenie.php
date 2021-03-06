<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_GET['pom']) && isset($_GET['kod'])) {
    print "ok";
    $kod = $_GET['kod'];
    $pomieszczenie = $_GET['pom'];
    $zap = "select * from pomieszczenia where nazwa_sali='" . $pomieszczenie . "' and nr_sali='" . $kod . ";";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) == 0) {
        $zap = "INSERT INTO `pomieszczenia` (`id`, `userzy_iduserzy`, `nazwa_sali`, `nr_sali`, `klima`)"
                . " VALUES (NULL, 1, '".$pomieszczenie."', '".$kod."', 0);";
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

