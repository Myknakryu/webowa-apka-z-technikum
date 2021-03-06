
<?php
session_start();
include 'toolbar.php';
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
?>
<div class='container-fluid' style='padding-top: 10px;'>
    <div class="row">
    <div class='col-md-2'>
        <ul class='list-group' id='typy'>
            <li class='list-group-item' name='Typ' id="przedmioty" onclick='wyswietl(this.id)'>Przedmioty</li>
            <li class='list-group-item' name='Typ' id="kategorie" onclick='wyswietl(this.id)'>Kategorie</li>
        </ul>
    </div>
    <div class="col-md-10" id='wynik'>
        
        </div>
    </div>
</div>
</div>
<script src='../js/wyswietlPrzedmioty.js'></script>
<script src='../js/nowyElement.js'></script>
<script src='../js/nowaKategoria.js'></script>

</body>