<?php
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if(isset($_GET['q'])){

    $zap = "select phi.id, inw.nazwa ,phi.ilosc, phi.utworzenie, phi.edycja from pomieszczenia_has_inwentarz phi inner join inwentarz inw on (inw.idprzedmioty = phi.inwentarz_idprzedmioty) where pomieszczenia_id=". $_GET['q'].";";
    $zapytanie = mysqli_query($serw, $zap);
    if (mysqli_num_rows($zapytanie) > 0) {
        echo "<table class='table table-striped table-dark'><tr>
        <th>ID</th>
        <th>Przedmiot</th>
        <th>Ilość</th>
        <th>Utworzono</th>
        <th>Edytowano</th>
        </tr>";
        while($wynik = mysqli_fetch_assoc($zapytanie)){
            echo "<tr>
            <td>".$wynik['id']."</td>
            <td>".$wynik['nazwa']."</td>
            <td>".$wynik['ilosc']."</td>
            <td>".$wynik['utworzenie']."</td>
            <td>".$wynik['edycja']."</td>";
            echo "<br>";
        }
        echo "</table></div>";
    }
}
        else{
            echo "nope";
        }

?>