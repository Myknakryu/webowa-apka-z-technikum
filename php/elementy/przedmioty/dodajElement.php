<?php
session_start();
$serw = mysqli_connect("localhost","root","zaq1@WSX", "baza");
?>
<div id="dialog-form" title="Nowy przedmiot" style="display:none;">
    <p class="validateTips">Wszystkie pola są wymagane.</p>

    <form>
        <fieldset>
            <label for="nazwa">Nazwa przedmiotu</label>
            <input type="text" name="nazwa" id="nazwa" class="text ui-widget-content ui-corner-all">
            <label for="producent">Nazwa producenta</label>
            <input type="text" name="producent" id="producent" class="text ui-widget-content ui-corner-all">
            
            <input type='checkbox' name='gwarancja' id='gwarancja'>
            <label for="gwarancja">Gwarancja</label>
            <br/>
            <label for='selektor'>Kategoria: </label>
            <?php
            $zap = 'select * from kategoria';
            
            $zapytanie = mysqli_query($serw, $zap);
            if (mysqli_num_rows($zapytanie) > 0) {
                //Tworzy selecta z listą kategorii
                echo "<select name='selektor' id='selektor';'>";

                while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                    echo "<option value=" . $wynik['idkategoria'] . ">" . $wynik['nazwa']."</option>";
                }
                 echo '</select>';
            }
            ?>
            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
        </fieldset>
    </form>
</div>