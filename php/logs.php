
<body>
<script src="../js/logi.js"></script>
<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");

include 'toolbar.php';
echo "<div class='container-fluid>";
echo "<div class='row'>";
echo "<br>";
?>
<div class ='col-md-12'>
<?php
if($_SESSION['upraw']=="1"){
$zap = "select op.id, concat(pom.nazwa_sali, ' - ', pom.nr_sali) "
        . "pomieszczenie, op.operacja, op.iloscPrzed, op.iloscPo, "
        . "concat(inw.producent, ' ', inw.nazwa) as przedmiot, usr.login as uzytkownik from operacje op "
        . "inner join inwentarz inw on (op.przedmiot = inw.idprzedmioty) "
        . "inner join userzy usr on (op.uzytkownik = usr.iduserzy) "
        . "inner join pomieszczenia pom on (op.pomieszczenie = pom.id)  ";
$zapytanie = mysqli_query($serw, $zap);

if (mysqli_num_rows($zapytanie) > 0) {

    echo '<div class="card-body" style="height:80vh; overflow: hidden;"><div class="card-header">
            Logi
        </div>
        <div class="card-body" style="height:90%; overflow-y: scroll; margin:10px;">';
                echo "<table class='table table-striped table-dark'><tr>
        <th>ID</th>
        <th>Pomieszczenie</th>
        <th>Użytkownik</th>
        <th>Przedmiot</th>
        <th>Operacja</th>
        </tr>";
                while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    echo "<tr>
            <td>" . $wynik['id'] . "</td>
            <td>" . $wynik['pomieszczenie'] . "</td>
            <td>" . $wynik['uzytkownik'] . "</td>
            <td>" . $wynik['przedmiot'] . "</td>
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
                echo "</table></div>";
            
        
    echo '</div><div class="card-footer"></div>';
    }
}
echo '</div>';
                   
echo "</div>";
?>
</div>
</div>
</body>
