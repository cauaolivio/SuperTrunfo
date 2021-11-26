<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../components/mainHeader/styles.css">
  <link rel="stylesheet" href="../components/cardUser/styles.css">
  <link rel="stylesheet" href="../components/cardMachine/styles.css">
  <link rel="stylesheet" href="../components/footer/styles.css">

  <script src="https://kit.fontawesome.com/2a358d9687.js" crossorigin="anonymous"></script>
  <script src="../js/game.js"></script>
  
  <title>Início | SuperTrunfo</title>
</head>
<body>
  <header>
    <?php
      // include "../database/drawCards.php";
      include "../components/mainHeader/index.php";
    ?>
  </header>

  <main class="content-main">
    <div class="cards-game">
      <?php
        include "../components/cardUser/index.php";
      ?>
      <div class="wrapper-game">
        <span class="message-result"></span>
        <input class="buttom-game" type="button" onClick="startGame()" name="buttom-game"  value="Iniciar partida">
        <input class="buttom-play" type="button" onClick="playGame()" name="buttom-play" value="Jogar">
      </div>
      
      <?php
        include "../components/cardMachine/index.php";
      ?>

      <a class="link-end-game" href="">Abandonar Partida</a>
    </div>
    <div class="content-end-game">
      <h2 class="title-modal"></h2>
      <span class="message-modal"></span>
      <input class="buttom-play-again" type="button" onClick="startGame()" name="buttom-game"  value="Jogar novamente">
      <a class="link-exit" href="">Sair</a>
    </div>
  </main>

  <footer>
    <?php
      include "../components/footer/index.php";
    ?>
  </footer>
</body>
</html>