<?php
session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if(isset($_GET['pom']))
{
    $id = $_GET['pom'];
$zap = "select * from inwentarz where idprzedmioty=$id";
$nazwa = mysqli_fetch_assoc(mysqli_query($serw,$zap))['nazwa'];
$producent = mysqli_fetch_assoc(mysqli_query($serw,$zap))['producent'];
$gwarancja = mysqli_fetch_assoc(mysqli_query($serw,$zap))['gwarancja'];
$zap = "select count(id) as ilosc from pomieszczenia_has_inwentarz where inwentarz_idprzedmioty=$id";
$iloscElem = mysqli_fetch_assoc(mysqli_query($serw,$zap))['ilosc'];

$zap = "select sum(ilosc) as ilosc from pomieszczenia_has_inwentarz where inwentarz_idprzedmioty =$id";
$iloscInw = mysqli_fetch_assoc(mysqli_query($serw,$zap))['ilosc'];

echo "<div id='dialog-form' title='Przedmiot: $nazwa' style='display:none; overflow-y: hidden;'>
    <div class='row'>
    <div class='col-md-6'>
    <table class='table'>
    <tr>
        <td>id</td><td>$id</td> 
    </tr><tr>
        <td>nazwa:</td><td>$nazwa<td>
            </tr><tr>
        <td>Producent:</td><td>$producent<td>
            </tr><tr>
        <td>Gwarancja:</td><td>$gwarancja<td>
    </tr><tr>
        <td>Elementów w bazie:</td><td class='align-middle'>$iloscElem</td>
    </tr><tr>
    <td>Elementów w inwentarzu</td><td class='align-middle'>$iloscInw</td>
        </tr>
    </table>
    </div>
    <div class='col-md-6'>
    <h6>Przedmioty znajdują się w</h6>";
    $zap="select concat(p.nazwa_sali , ' - ' , p.nr_sali) as nazwa ,phi.ilosc as ilosc from pomieszczenia p "
            . "inner join pomieszczenia_has_inwentarz phi on (phi.pomieszczenia_id=p.id) "
            . "where p.id in (select pomieszczenia_id from pomieszczenia_has_inwentarz where inwentarz_idprzedmioty = $id) "
            . "and phi.inwentarz_idprzedmioty=$id ";
    $zapytanie = mysqli_query($serw,$zap);
    if (mysqli_num_rows($zapytanie) > 0) {
                    echo "<div style='height:300px; overflow:auto; overflow-x:hidden;'><table class='table table-striped table-dark' style='margin-bottom:5px; overflow:auto;'><tr>
        <th>Pomieszczenie</th>
        <th>Ilosc</th>
        </tr>";
    
    while ($wynik = mysqli_fetch_assoc($zapytanie)) {
        echo "<tr>
            <td>" . $wynik['nazwa'] . "</td>
            <td>" . $wynik['ilosc'] . "</td>" .
            "</tr>";
        }
    }
    else{echo "Element nie występuje w pomieszczeniach";}
    echo "</table></div>";
    echo    "</div>
    </div>
</div>";
}
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

