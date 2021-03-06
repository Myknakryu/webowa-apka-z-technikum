
<body>
<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
include 'toolbar.php';
echo "<div class='container'>";
echo "<div class='row'>";
echo "<br>";
echo '<div class="col-md-4"></div>';
?>
<div class ='col-md-4'>
<?php
echo "Wybierz z listy ktore pomieszczenie chcesz edytowac:";
echo "<br>";
if ($_SESSION['upraw']=='2'){
    $zap = "select * from pomieszczenia where userzy_iduserzy ='".$_SESSION['id']."';";
    $blok = 0;
}
if ($_SESSION['upraw']=='3'){
    $zap = "select * from pomieszczenia;";
    $blok = 1;
}
$zapytanie = mysqli_query($serw, $zap);
if (mysqli_num_rows($zapytanie) > 0) {
    echo "<select name='sala' id='selektor' onchange='wyswietl(this.value);'>";

    while($wynik = mysqli_fetch_assoc($zapytanie)){
        echo "
        <option value=".$wynik['id'].">".$wynik['nr_sali']."</option>";
    }
    echo "</select><br/>";
    echo "<div id='tekst'/>";
    echo "<script src='../js/java.js'></script>";
}
echo '</div>';
if($_SESSION['upraw']=='2'){                         
echo '<input type="submit" value="Wyslij formularz" name="zalog">';
}
if($_SESSION['upraw']=='3'){
echo '<input type="submit" value="Wyslij formularz" name="zalog">';
echo '<script>alert("Wybacz, ta opcja dostepna jest tylko dla naszych nauczycieli");</script>';
}
echo "</div>";
echo '<div class="col-md-4"></div>';
?>
</div>
</div>
</body>
