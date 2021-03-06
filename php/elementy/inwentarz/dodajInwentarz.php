<?php
session_start();
$serw = mysqli_connect("localhost","root","zaq1@WSX", "baza");
?>
<div id="dialog-form" title="Dodaj element do pomieszczenia" style="display:none;">
  <p class="validateTips">Wszystkie pola są wymagane.</p>
 
  <form>
    <fieldset>
      <label for='selektor'>Przedmiot: </label>
            <?php
            $zap = 'select * from inwentarz where idprzedmioty not in '
                    . '(select inwentarz_idprzedmioty from '
                    . 'pomieszczenia_has_inwentarz where pomieszczenia_id='.$_GET['pom'].') ';
            
            $zapytanie = mysqli_query($serw, $zap);
            if (mysqli_num_rows($zapytanie) > 0) {
                //Tworzy selecta z listą kategorii
                echo "<select name='selektor' id='selektor' label=' '>";
                echo '<option disabled selected value> Wybierz element</option>';
                while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    echo "<option value=" . $wynik['idprzedmioty'] . ">" .$wynik['producent'].' '. $wynik['nazwa']."</option>";
                }
                 echo '</select>';
            }
            ?>
      <br/>
      <label for="ilosc">Ilość</label>
        <input type="number" name="nrSali" id="ilosc" class="text ui-widget-content ui-corner-all">
      
     <?php 
     echo '<input type="submit" id="submit" value="'.$_GET['pom'].'"  tabindex="-1" style="position:absolute; top:-1000px">';
             ?>
    </fieldset>
  </form>
</div>