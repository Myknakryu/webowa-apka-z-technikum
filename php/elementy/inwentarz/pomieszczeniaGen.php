<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if(isset($_GET['q']))
{
    $zap="";
    $co = $_GET['q'];
    $usr=$_SESSION['id'];
    if($co=='part')
         $zap = "select * from pomieszczenia where userzy_iduserzy=$usr;;";
    else
         $zap = "select * from pomieszczenia;";
$zapytanie = mysqli_query($serw, $zap);
while ($wynik = mysqli_fetch_assoc($zapytanie)) {
    echo "<li class='list-group-item' name='pomieszczenia' value=" . $wynik['id'] . " onclick='pokazPomieszczenie(this.value)'>" . $wynik['nr_sali']." - ". $wynik['nazwa_sali']. "</option>";
}
}

