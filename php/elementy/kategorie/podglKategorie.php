<?php
session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if(isset($_GET['pom']))
{
    $id = $_GET['pom'];
$zap = "select * from kategoria where idkategoria=$id";
$nazwa = mysqli_fetch_assoc(mysqli_query($serw,$zap))['nazwa'];

$zap = "select count(nazwa) as ilosc from inwentarz where kategoria_idkategoria=$id";
$iloscElem = mysqli_fetch_assoc(mysqli_query($serw,$zap))['ilosc'];

$zap = "select sum(ilosc) as ilosc from pomieszczenia_has_inwentarz "
        . "where inwentarz_idprzedmioty in (select idprzedmioty from inwentarz where kategoria_idkategoria=$id)";
$iloscInw = mysqli_fetch_assoc(mysqli_query($serw,$zap))['ilosc'];

echo "<div id='dialog-form' title='kategoria: $nazwa' style='display:none; overflow-x: hidden; overflow-y:hidden;'>
    <div class='row'>
    <div class='col-md-6'>
    <table class='table'>
    <tr>
        <td>id</td><td>$id</td> 
    </tr><tr>
        <td>nazwa:</td><td>$nazwa<td>
    </tr><tr>
        <td>Elementów w bazie:</td><td class='align-middle'>$iloscElem</td>
    </tr><tr>
    <td>Elementów w inwentarzu</td><td class='align-middle'>$iloscInw</td>
        </tr>
    </table>
    </div>
    <div class='col-md-6'>
    <h6>Elementy o tej kategorii</h6>";
    $zap="select idprzedmioty, concat(producent , ' ' , nazwa) as nazwa from inwentarz where kategoria_idkategoria=$id ";
    $zapytanie = mysqli_query($serw,$zap);
    if (mysqli_num_rows($zapytanie) > 0) {
                    echo "<div style='height:250px; overflow:auto;'><table class='table table-striped table-dark' style='margin-bottom:5px; overflow:auto;'><tr>
        <th>ID</th>
        <th>Przedmiot</th>
        </tr>";
    
    while ($wynik = mysqli_fetch_assoc($zapytanie)) {
        echo "<tr>
            <td>" . $wynik['idprzedmioty'] . "</td>
            <td>" . $wynik['nazwa'] . "</td>" .
            "</tr>";
        }
    }
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

