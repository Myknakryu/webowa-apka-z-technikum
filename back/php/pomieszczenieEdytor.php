<?php
session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (isset($_GET['q'])) {
    ?>
    <div class="card">
        <div class="card-header">
            Pomieszczenie
        </div>
        <div class="card-body" style="height:60vh">
            <?php
            $zap = "select phi.id, inw.nazwa ,phi.ilosc, phi.utworzenie, phi.edycja from pomieszczenia_has_inwentarz phi inner join inwentarz inw on (inw.idprzedmioty = phi.inwentarz_idprzedmioty) where pomieszczenia_id=" . $_GET['q'] . ";";
            $zapytanie = mysqli_query($serw, $zap);
            if (mysqli_num_rows($zapytanie) > 0) {
                echo "<table class='table table-striped table-dark'><tr>
        <th>ID</th>
        <th>Przedmiot</th>
        <th>Ilość</th>
        <th>Utworzono</th>
        <th>Edytowano</th>
        <th>Operacja</th>
        </tr>";
                while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    echo "<tr>
            <td>" . $wynik['id'] . "</td>
            <td>" . $wynik['nazwa'] . "</td>
            <td>" . $wynik['ilosc'] . "</td>
            <td>" . $wynik['utworzenie'] . "</td>
            <td>" . $wynik['edycja'] . "</td>".
            "<td><button class='btn btn-danger btn-sm' value=".$wynik['id'].">Usuń</button>";
                    echo "<br>";
                }
                echo "</table></div>";
            }
        }
        ?>
    </div>
    <div class="card-footer">
        <button class="btn btn-success">Dodaj element</button>
    </div>
</div>