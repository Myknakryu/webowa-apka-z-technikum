<?php
session_start();
$serw = mysqli_connect("localhost","root","zaq1@WSX", "baza");
?>
<div id="dialog-form" title="Nadaj pomieszczenie użytkownikowi" style="display:none;">
  <p class="validateTips">Wszystkie pola są wymagane.</p>
 
  <form>
    <fieldset>
      <label for='selektor'>Użytkownik: </label>
            <?php
            $zap = "select * from userzy where uprawnienia_id='2'";
            
            $zapytanie = mysqli_query($serw, $zap);
            if (mysqli_num_rows($zapytanie) > 0) {
                //Tworzy selecta z listą kategorii
                echo "<select name='selektor' id='selektor' label=' '>";
                echo '<option disabled selected value> Wybierz użytkownika</option>';
                while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    echo "<option value=" . $wynik['iduserzy'] . ">" .$wynik['login']."</option>";
                }
                 echo '</select>';
            }
            ?>
      <br/>
      
     <?php 
     echo '<input type="submit" id="submit" value="'.$_GET['pom'].'"  tabindex="-1" style="position:absolute; top:-1000px">';
             ?>
    </fieldset>
  </form>
</div>