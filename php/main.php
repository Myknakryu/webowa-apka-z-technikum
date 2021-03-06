
<body>
<?php
session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


if ($_SESSION['upraw']=='2'){
    $zap = "select * from pomieszczenia where userzy_iduserzy ='".$_SESSION['id']."';";
}

include 'toolbar.php';
echo "<div class='container-fluid' style='margin-top: 20px;'>";
echo "<div class='row'>";
echo '<div class="col-lg-4">';

if($_SESSION['upraw']=='2'){
$zapytanie = mysqli_query($serw, $zap);
if (mysqli_num_rows($zapytanie) > 0) {
    echo "<h3>Posiadane pomieszczenia</h3>";
    echo "<table class='table'><thead class='thead-light'><tr>
        <th>ID</th>
        <th>nazwa sali</th>
        <th>nr sali</th>
        </tr></thead><tbody>";
    while($wynik = mysqli_fetch_assoc($zapytanie)){
        echo "<tr>
        <td>".$wynik['id']."</td>
        <td>".$wynik['nazwa_sali']."</td>
        <td>".$wynik['nr_sali']."</td>";
    }
    echo "</tbody></table>";
    }
}

if($_SESSION['upraw']=='1'){
$zap="select op.id, concat(pom.nazwa_sali, ' - ', pom.nr_sali) "
        . "pomieszczenie, op.operacja, op.iloscPrzed, op.iloscPo, "
        . "concat(inw.producent, ' ', inw.nazwa) as przedmiot, usr.login as uzytkownik from operacje op "
        . "inner join inwentarz inw on (op.przedmiot = inw.idprzedmioty) "
        . "inner join userzy usr on (op.uzytkownik = usr.iduserzy) "
        . "inner join pomieszczenia pom on (op.pomieszczenie = pom.id) order by op.id desc limit 5;";
$zapytanie = mysqli_query($serw, $zap);

if (mysqli_num_rows($zapytanie) > 0) {
    echo "<h3>Ostatnie zmiany</h3>";
    echo "<table class='table'><thead class='thead-light'><tr>
        <th>Sala</th>
        <th>Użytkownik</th>
        <th>Operacja</th>
        </tr></thead>";
    while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    echo "<tr>
            <td>" . $wynik['pomieszczenie'] . "</td>
            <td>" . $wynik['uzytkownik'] . "</td>
            <td>"; 
                    if($wynik['operacja']=="Dodanie")
                        echo "Dodano ".$wynik['przedmiot']. " w ilości ". $wynik['iloscPo'];
                    else if($wynik['operacja']=="Usuniecie")
                        echo "Usunięto ".$wynik['przedmiot'];
                    else if($wynik['operacja']=="Zmiana")
                        echo "Zmieniono ".$wynik['przedmiot']. " z ". $wynik['iloscPrzed']. " do ilości ". $wynik['iloscPo'];
                    echo "</td>";
                    echo "</tr>";
                }
            echo "</table>";
    }
}
echo "</div>";
$zap = "select * from pomieszczenia;";
$zapytanie = mysqli_query($serw, $zap);
echo '<div class="col-lg-4">';
if (mysqli_num_rows($zapytanie) > 0) {
    echo "<h3>Dostępne pomieszczenia</h3>";
    echo "<table class='table'><thead class='thead-dark'><tr>
        <th>ID</th>
        <th>nazwa sali</th>
        <th>nr sali</th>
        </tr></thead>";
    while($wynik = mysqli_fetch_assoc($zapytanie)){
        echo "<tr>
        <td>".$wynik['id']."</td>
        <td>".$wynik['nazwa_sali']."</td>
        <td>".$wynik['nr_sali']."</td>";
    }
    echo "</table></div>";
}
?>
<div class ='col-lg-4'>
<?php
echo "Szybki Podgląd:";
echo "<br>";
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
echo "</div>";
echo "</div>";
echo "</div>";
?>
</body>
<?php