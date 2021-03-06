<html lang='PL'>
<head>
<meta charset='utf-8'>
<link rel="stylesheet" src="../css/style.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/black-tie/jquery-ui.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Inventor</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto" >
      <li class="nav-item active">
        <a href="main.php" class="btn btn-outline-primary">Strona główna</a>
      </li><?php
      if($_SESSION['upraw']!='1'){
        echo '
        &nbsp;
      <li class="nav-item">
        <a href="formularze.php" class="btn btn-outline-primary">Formularze</a>
      </li>&nbsp;<li class="nav-item">
        <a href="tworzenie.php" class="btn btn-outline-primary">Pomieszczenia</a>
      </li>'.
          '&nbsp;
      <li class="nav-item">
        <a href="przedmioty.php" class="btn btn-outline-primary">Inwentarz</a>
      </li>';
        
      }
      ?>
      &nbsp;
      <?php
      if($_SESSION['upraw']=='1'){
      echo '
      <li class="nav-item">
        <a href="logs.php" class="btn btn-outline-primary">Logi</a>
      </li>
      &nbsp;
      <li class="nav-item">
        <a href="tworzenie.php" class="btn btn-outline-primary">Pomieszczenia</a>
      </li>'.
          '&nbsp;
      <li class="nav-item">
        <a href="przedmioty.php" class="btn btn-outline-primary">Inwentarz</a>
      </li>'.
          '&nbsp;
      <li class="nav-item">
        <a href="uzytkownicy.php" class="btn btn-outline-primary">Użytkownicy</a>
      </li>';
      
      }
      ?>
      </ul>
    <span class="navbar-text">
      <?php 

        echo "Jestes zalogowany jako: ".$_SESSION['log'];

      ?>
      <a href="wyloguj.php" class="btn btn-outline-primary">Wyloguj</a>
    </span>
  </div>
</nav>

</body>
</html>