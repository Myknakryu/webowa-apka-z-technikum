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
echo "<p>Pomieszczenia do wyboru: "
 . "<button class='btn btn-success btn-xxs float-right' onclick='otworzOkno()'>+"
 . "</button></p>";

// Tworzy zapytanie do pomieszczeń
echo "<ul class='list-group' id='pomieszczenia'>";


echo '</ul></div>';
// wyświetla pomieszczenie
echo '<div class="col-md-9" id="wyswietlacz"></div>'
?>
<script src="../js/pomieszczenia.js"></script>
<script src="../js/wyswietlEdytor.js"></script>
</body>
</html>