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
                $zap = "select idkategoria, nazwa, (case when exists "
                        . "(select 1 from inwentarz i where k.idkategoria = i.kategoria_idkategoria)"
                        . " then 1 else 0 end) istnienie from kategoria k";
                $zapytanie = mysqli_query($serw, $zap);
                if (mysqli_num_rows($zapytanie) > 0) {
                    echo "<table class='table table-striped table-dark'><tr style='background-color: black;'>
        <th>ID</th>
        <th>Nazwa</th>
        <th>Operacja</th>
        </tr>";
                    while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                        echo "<tr>
            <td>" . $wynik['idkategoria'] . "</td>
            <td>" . $wynik['nazwa'] . "</td>" .
                        "<td>";
                        if($_SESSION['upraw']=='1'&& $wynik['istnienie']==0)       
                            echo "<button class='btn btn-danger btn-sm' value='" . $wynik['idkategoria'] . "' onclick='kategoriaUsun(this.value);'>Usuń</button>";
                        else
                            echo "<button class='btn btn-primary btn-sm' value=" . $wynik['idkategoria'] . " onclick='kategoriaPodglad(this.value)'>Statystyki</button>";
                        echo "</td>";
                    }
                    echo "</table></div>";
                }
                ?>

                <div class="card-footer">
                    <?php
                    if($_SESSION['upraw']=='1')
                    echo "<button class='btn btn-success' onclick='otworzOknoKategorii()'>Dodaj element</button>";
                            ?>
                </div>
            </div>