<?php include 'main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina controllo alunni</title>
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <style>
    * {font-family: 'Quicksand', sans-serif;}
    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: row;
      background-image: repeating-linear-gradient(90deg, rgba(246, 246, 246,0.5) 0px, rgba(246, 246, 246,0.5) 20px,transparent 20px, transparent 40px),repeating-linear-gradient(0deg, rgba(246, 246, 246,0.5) 0px, rgba(246, 246, 246,0.5) 20px,transparent 20px, transparent 40px),linear-gradient(90deg, #ffffff,#ffffff);
      width: 100vw;
      height: 100vh;
      padding: 0px;
      margin: 0px;
      position: fixed;
      top: 0;
      left: 0;
    }

    .container div {
      width: 15vw;
      padding: 2em;
      background:whitesmoke;
      box-shadow: 10px 10px 0 0 rgba(160, 160, 160, 0.5);
      margin: 1em;
      text-align: center;
    }

    span {
      font-weight: bold;
      font-size: 1.3em;
    }

    .container div.a {
      background-color: rgb(217, 238, 225);
    }

    .container div.b {
      background-color: rgb(238, 230, 217);
    }

    .container div.c {
      background-color: rgb(238, 217, 217);
    }

    ul {
      list-style-type: none;
      list-style-position:inside;
      margin:0;
      padding:1em;
      word-break: normal;
      text-align: center;
    }

    li {
      width: 100%;
      display: block;
    }

  </style>
</head>
<body>
  <section class="container">
    <div class="a">
      <span>Alunni senza voti negativi</span>
      <ul>
        <?php 
          $list = solo_positivi();
          while($alunno = $list -> fetch_assoc()) {
            echo("<li>".$alunno['cognome']." ".$alunno['cognome']."</li>");
          }
        ?>
      </ul>
    </div>
    <div class="b">
      <span>Alunni con voti negativi</span>
      <ul>
        <?php 
          $list = voti_negativi();
          while($alunno = $list -> fetch_assoc()) {
            echo("<li>".$alunno['cognome']." ".$alunno['cognome']."</li>");
          }
        ?>
      </ul>
    </div>
    <div class="c">
      <span>Alunni con materie negative</span>
      <ul>
        <?php 
          $list = materie_negative();
          while($alunno = $list -> fetch_assoc()) {
            echo("<li>".$alunno['cognome']." ".$alunno['cognome']."</li>");
          }
        ?>
      </ul>
    </div>
  </section>
</body>
</html>