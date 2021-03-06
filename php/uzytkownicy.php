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
    $listaUpr="";
    $uprawnienia = "";
    $zap = "select * from uprawnienia";
    $zapytanie = mysqli_query($serw, $zap);
            if (mysqli_num_rows($zapytanie) > 0) {
                //Tworzy selecta z listą kategorii
                $uprawnienia .= '<option value="NULL"> Konto wyłączone</option>';
                while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    $uprawnienia .= "<option value=" . $wynik['id'] . ">" .$wynik['poziom_uprawnien']."</option>";
                }
                 $uprawnienia .= '</select>';

                 
            }
            $zap = "select * from userzy";
$zapytanie = mysqli_query($serw, $zap);
echo '<div class="card-body" style="height:75vh; overflow: hidden;"><div class="card-header">
            Zarządzanie użytkownikami
        </div>
        <div class="card-body" style="height:70vh; overflow-y: scroll; margin:10px;">';
                echo "<table class='table table-striped table-dark'><tr>
        <th>ID</th>
        <th>Użytkownik</th>
        <th>Data utworzenia</th>
        <th>Data aktualizacji</th>
        <th>Poziom uprawnień</th>
        </tr>";
                while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    echo "<tr>
            <td>" . $wynik['iduserzy'] . "</td>
            <td>" . $wynik['login'] . "</td>
            <td>" . $wynik['data_utworzenia'] . "</td>
            <td>" . $wynik['data_edycji'] . "</td>
            <td>"; 
                    echo "<select name='uprawnienia' id='usr".$wynik['iduserzy']."' label=' ' value='".$wynik['uprawnienia_id']."'>";
                        echo $uprawnienia;
                    echo "</td>";
                    echo "</tr>";
                    $listaUpr .= $wynik['uprawnienia_id'].',';
                }
                echo "</table></div>";
            
        
    echo '</div><div class="card-footer">';
    echo "<button class='btn btn-success btn-md float-right' onclick='porownanie()'>Aktualizuj użytkowników</button>";
    echo '</div></div>';
                   
echo "</div>";
    echo "<p id='listaUpr' style='display:none;'>$listaUpr</p>";
    echo "<script src='../js/uzytkownicy.js'></script>";
    echo "<script src='../js/powszechne.js'></script>";
                }



?>
