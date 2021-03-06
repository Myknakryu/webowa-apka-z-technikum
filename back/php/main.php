
<body>
<?php

session_start();
$serw = mysqli_connect("localhost","root","zaq1@WSX", "baza");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($_SESSION['log']=='admin'){
    $zap = "select * from pomieszczenia;";
    $blok = 0;
}
if ($_SESSION['log']=='klient'){
    $zap = "select * from pomieszczenia where userzy_iduserzy ='".$_SESSION['log']."';";
    $blok = 0;
}
if ($_SESSION['log']=='gosc'){
    $zap = "select * from pomieszczenia;";
    $blok = 1;
}
include 'toolbar.php';
echo "<div class='container'>";
echo "<div class='row'>";
echo "Pomieszczenia do wyboru: ";
echo "<br>";
echo '<div class="col-md-4"></div>';
//Tworzy liste wyboru
$zapytanie = mysqli_query($serw, $zap);
echo '<div class="col-md-4">';
if (mysqli_num_rows($zapytanie) > 0) {
    echo "<table><tr>
        <th>ID</th>
        <th>nazwa sali</th>
        <th>nr sali</th>
        </tr>";
    while($wynik = mysqli_fetch_assoc($zapytanie)){
        echo "<tr>
        <td>".$wynik['id']."</td>
        <td>".$wynik['nazwa_sali']."</td>
        <td>".$wynik['nr_sali']."</td>";
        echo "<br>";
    }
    echo "</table></div>";
}
?>
<div class ='col-md-4'>
<?php
echo "Wybierz z listy ktore pomieszczenie chcesz edytowac:";
echo "<br>";
// Tworzy listę wyboru
$zapytanie = mysqli_query($serw, $zap);
if (mysqli_num_rows($zapytanie) > 0) {
    //Select odwołuje się do JS'a by wykonać zapytanie wybranej sali
    echo "<select name='sala' id='selektor' onchange='wyswietl(this.value);'>";
    
    while($wynik = mysqli_fetch_assoc($zapytanie)){
        echo "
        <option value=".$wynik['id'].">".$wynik['nr_sali']."</option>";
    }
    echo "</select><br/>";
    echo "<div id='tekst'/>";
    echo "<script src='../js/java.js'></script>";
}
echo "</div>";
echo "</div>";
echo "</div>";
?>
</body>
</html>