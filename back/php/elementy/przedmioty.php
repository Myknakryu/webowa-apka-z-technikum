<?php
session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
?>

<div class="card">
            <div class="card-header">
                Przedmioty
            </div>
            <div class="card-body" style="height:60vh; overflow-x:hidden; overflow-y:scroll;">
                <?php
                $zap = "select i.idprzedmioty as id, k.nazwa as kategoria, i.producent, i.nazwa, i.gwarancja "
                        . "from inwentarz i "
                        . "inner join kategoria k on (i.kategoria_idkategoria=k.idkategoria) ;";
                $zapytanie = mysqli_query($serw, $zap);
                if (mysqli_num_rows($zapytanie) > 0) {
                    echo "<table class='table table-striped table-dark'><tr>
        <th>ID</th>
        <th>kategoria</th>
        <th>Nazwa</th>
        <th>Producent</th>
        <th>Gwarancja</th>
        <th>Operacja</th>
        </tr>";
                    while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                        echo "<tr>
            <td>" . $wynik['id'] . "</td>
            <td>" . $wynik['kategoria'] . "</td>
            <td>" . $wynik['nazwa'] . "</td>
            <td>" . $wynik['producent'] . "</td>
            <td>" . $wynik['gwarancja'] . "</td>" .
                        "<td><button class='btn btn-danger btn-sm' value=" . $wynik['id'] . " onclick='elementUsun(this.value)'>Usuń</button>";
                        echo "<br>";
                    }
                    echo "</table>";
                }
                ?>
                </div>
            
                <div class="card-footer">
                    <button class="btn btn-success" onclick='otworzOknoElementu()'>Dodaj element</button>
                </div>
    </div>