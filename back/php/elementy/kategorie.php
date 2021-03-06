<?php
session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
?>

<div class="card">
            <div class="card-header">
                Kategorie
            </div>
            <div class="card-body" style="height:60vh; overflow-y: scroll">
                <?php
                $zap = "select * from kategoria;";
                $zapytanie = mysqli_query($serw, $zap);
                if (mysqli_num_rows($zapytanie) > 0) {
                    echo "<table class='table table-striped table-dark'><tr style='position:sticky; top:0; background-color: black;'>
        <th>ID</th>
        <th>Nazwa</th>
        <th>Operacja</th>
        </tr>";
                    while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                        echo "<tr>
            <td>" . $wynik['idkategoria'] . "</td>
            <td>" . $wynik['nazwa'] . "</td>" .
                        "<td><button class='btn btn-danger btn-sm' value='" . $wynik['idkategoria'] . "' onclick='kategoriaUsun(this.value);'>Usuń</button>";
                        echo "<br>";
                    }
                    echo "</table></div>";
                }
                ?>

                <div class="card-footer">
                    <button class="btn btn-success" onclick='otworzOknoKategorii()'>Dodaj element</button>
                </div>
            </div>