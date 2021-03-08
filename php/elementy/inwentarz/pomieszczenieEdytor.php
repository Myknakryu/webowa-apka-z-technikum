<?php
session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
$posiadane = false;

            
if (isset($_GET['q'])) {
    $zap = "select * from pomieszczenia where id=".$_GET['q'].";";
                
                $zapytanie = mysqli_query($serw, $zap);
                $stuff =mysqli_fetch_assoc($zapytanie);
                $wlasciciel = $stuff['userzy_iduserzy'];
                if($stuff['userzy_iduserzy']==$_SESSION['id']||$_SESSION['upraw']=='1')
                    $posiadane=true;
    ?>
    <div class="card">
        <div class="card-header" 
            <?php
            if($stuff['klima']=='1')
        echo "style = 'background-color: dark-cyan; "
        . "background-image: linear-gradient(to bottom right, lightblue, darkcyan);'"?>>
            Pomieszczenie
            <?php 
                echo $stuff['nazwa_sali']." - ".$stuff['nr_sali'];
            ?>
        </div>
        <div class="card-body" style="height:65vh; overflow-y: auto;overflow-x: hidden; margin:10px;"> 
            <?php
            $zap = "select phi.id, inw.nazwa ,phi.ilosc, phi.utworzenie, phi.edycja from pomieszczenia_has_inwentarz phi inner join inwentarz inw on (inw.idprzedmioty = phi.inwentarz_idprzedmioty) where pomieszczenia_id=" . $_GET['q'] . ";";
            $zapytanie = mysqli_query($serw, $zap);
            if (mysqli_num_rows($zapytanie) > 0) {
                echo "<table class='table table-striped table-dark'><tr>
        <th>ID</th>
        <th>Przedmiot</th>
        <th>Ilość</th>
        <th>Utworzono</th>
        <th>Edytowano</th>";
        if($posiadane)
            echo "<th>Operacja</th>";
        echo "</tr>";
                while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    echo "<tr>
            <td>" . $wynik['id'] . "</td>
            <td>" . $wynik['nazwa'] . "</td>
            <td>" . $wynik['ilosc'] . "</td>
            <td>" . $wynik['utworzenie'] . "</td>
            <td>" . $wynik['edycja'] . "</td>";
            if($posiadane)
            echo"<td><button class='btn btn-danger btn-sm' value='".$wynik['id']."'  onclick='inwentarzUsun(this.value)'>Usuń</button></td>";
                    echo "</tr>";
                }
                echo "</table></div>";
            }
        }
        
        ?>
    </div>
    <div class="card-footer">
        <?php
        $zap = "select * from userzy where iduserzy = $wlasciciel";
        $zapytanie = mysqli_query($serw, $zap);
        $stuff = mysqli_fetch_assoc($zapytanie);
        echo "Pomieszczenie należy do: ".$stuff['login'];
         if($posiadane){
            echo  "<button class='btn btn-success float-right' onclick='otworzOknoInwentarzu( ".$_GET['q'].")'>Dodaj element</button>";
            echo  "<button class='btn btn-warning float-right' onclick='pokazEdytorPom( ".$_GET['q'].")'>Zmień wartości</button>";
            
         }
         if($_SESSION['upraw']=='1')
             echo  "<button class='btn btn-primary float-right' onclick='otworzOknoWlasciciel( ".$_GET['q'].")'>Zmień właściciela</button>";
             echo $posiadane;
        ?>
    </div>
</div>
