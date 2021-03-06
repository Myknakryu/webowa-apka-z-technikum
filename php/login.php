<?php
session_start();
$serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


else{
    if(!isset($_POST['gosc'])){
    $log = $_POST['login'];
    $haslo = $_POST['haslo'];
    

    $zap = "select login,haslo,uprawnienia_id from userzy where login ='" .$log. "' and haslo = '".md5($haslo)."' and uprawnienia_id !='null';";
    $zapytanie = mysqli_query($serw, $zap);

    if (mysqli_num_rows($zapytanie) > 0) {
        $_SESSION['log']=$log;
        $_SESSION['haslo']=$haslo;
        $zap3 = "select iduserzy from userzy where login='".$log."';";
        $smth2 = mysqli_query($serw, $zap3);
        $_SESSION['id']=mysqli_fetch_array($smth2)[0];
        $zap2 = "select uprawnienia_id from userzy where login='".$log."';";
        $smth = mysqli_query($serw, $zap2);
        $_SESSION['upraw']=mysqli_fetch_array($smth)[0];
        echo "<br>";
        header('Location: main.php');
    }
    else{
        $_SESSION['locked'] = 1;
        header('Location: ../index.php');
    }
}
else{
    $zap = "select login,haslo,uprawnienia_id from userzy where login ='gosc' and haslo = 'gosc'";
    $zapytanie = mysqli_query($serw, $zap);

    
        $_SESSION['log']='gosc';
        $_SESSION['haslo']='gosc';
        $zap3 = "select iduserzy from userzy where login='gosc';";
        $smth2 = mysqli_query($serw, $zap3);
        $_SESSION['id']=mysqli_fetch_array($smth2)[0];
        $zap2 = "select uprawnienia_id from userzy where login='gosc';";
        $smth = mysqli_query($serw, $zap2);
        $_SESSION['upraw']=mysqli_fetch_array($smth)[0];
        echo "<br>";
        header('Location: main.php');
    
}
}
include 'toolbar.php';
?>