<?php

session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else if (isset($_POST['login'])) {
    $log = $_POST['login'];
    $haslo = $_POST['haslo'];

    $zap = "select login,haslo from userzy where login ='" . $log . "' and haslo = '" . $haslo . "';";
    $zapytanie = mysqli_query($serw, $zap);

    if (mysqli_num_rows($zapytanie) > 0) {
        $rekord = mysqli_fetch_assoc($zapytanie);
        $_SESSION['log'] = $log;
        $_SESSION['haslo'] = $haslo;
    } else {
        $_SESSION['wrong'] = 'zle_has';
        header('Location: ../index.php');
    }
}
include 'toolbar.php';
echo $rekord['login'] . $rekord['haslo'];
?>