  <style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

include 'toolbar.php';

echo "<div class='container-fluid' style='padding-top:5px;'>";
echo "<div class='row'>";
echo "<br>";
echo '<div class="col-md-3">';

if($_SESSION['upraw']==1)
 echo "<p>Pomieszczenia do wyboru: <button class='btn btn-success btn-xxs float-right' onclick='otworzOkno()'>+"
 . "</button></p>";
else if($_SESSION['upraw']==2){
    echo "<div>";
    echo "<div class='float-left'>Pomieszczenia do wyboru:</div>";
    echo "<div class='btn-group btn-group-toggle'  data-toggle='buttons'>
  <label class='btn btn-primary active'>
    <input type='radio' name='options' value='all' autocomplete='off' checked> Wszystkie
  </label>
  <label class='btn btn-primary'>
    <input type='radio' name='options' value='part' autocomplete='off'> Posiadane
</label></div></div>";}

// Tworzy zapytanie do pomieszczeń
echo "<ul class='list-group' id='pomieszczenia' style='height:60vh; overflow-y: auto; overflow-x: hidden'>";


echo '</ul></div>';
// wyświetla pomieszczenie
echo '<div class="col-md-9" id="wyswietlacz"></div>'
?>
  <script src="../js/powszechne.js"></script>
<script src="../js/pomieszczenia.js"></script>
<script src="../js/wyswietlInwentarz.js"></script>
</body>
</html>