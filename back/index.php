<?php
session_start();
if (!isset($_SESSION['wrong'])) {
    $_SESSION['wrong'] = 'gut';
}
?>
<html lang='PL'>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" src="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <?php
    $serw = mysqli_connect("localhost", "root", "zaq1@WSX", "baza");
    if (!$serw) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    /* if ($_SESSION['wrong']=='zle_has'){
      echo '<script type="text/javascript">alert("Zle dane logowania!");</script>';
      } */
    ?>
    <body style = 'overflow:hidden'>
        <div class="jumbotron" style="min-height: 100vh; display:flex; align-items:center; overflow:hidden;">
            <div class='container'>
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center align-middle"></div>
                    <div class="col-md-4 text-center">
                        <form method="POST" action="php/login.php">
                            <b>Login:</b> <input type="text" name="login"><br><br>
                            <b>Hasło:</b> <input type="password" name="haslo"><br>
                            <input type="submit" value="Zaloguj sie" name="zalog">
                        </form>
                    </div>
                    <div class="col-md-4 text-center"></div>
                </div>
            </div>
        </div>
    </body>
</html>