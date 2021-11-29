<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/formCreateCard.css">
  <link rel="stylesheet" href="../components/mainHeader/styles.css">
  <link rel="stylesheet" href="../components/footer/styles.css">

  <script src="https://kit.fontawesome.com/2a358d9687.js" crossorigin="anonymous"></script>

  <title>Criar carta | SuperTrunfo</title>
</head>
<body>
  <header>
    <?php
      include "../components/mainHeader/index.php";
    ?>
  </header>

  <main class="content-main">
    <h2>Crie uma carta</h2>
    <?php
      session_start();
      if (isset($_SESSION['erro'])) {
        echo '<span class="alert-error">'. $_SESSION['erro'] .'</span>';
      } 
    ?>
    <form action="../database/saveCard.php" method="POST">
        <div class="form-line">
          <div class="form-item">
            <label for="nome" class="label-item">Nome</label>
            <input type="text" class="input-item" name="nome">
          </div>
          <div class="form-item">
            <label for="url" class="label-item">Link da imagem</label>
            <input type="url" class="input-item" name="url">
          </div>
        </div>
        <div class="form-line middle">
          <div class="form-item">
            <label for="potencia" class="label-item">Potência (CV)</label>
            <input type="text" class="input-item" name="potencia">
          </div>
          <div class="form-item">
            <label for="motor" class="label-item">Motor</label>
            <input type="text" class="input-item" name="motor">
          </div>
          <div class="form-item">
            <label for="velMax" class="label-item">Velocidade Máxima (Km/h)</label>
            <input type="text" class="input-item" name="velMax">
          </div>
        </div>
        <div class="form-line">
          <div class="form-item">
            <label for="tempZeroCem" class="label-item">Tempo de 0 km/h a 100 km/h (seg)</label>
            <input type="text" class="input-item" name="tempZeroCem">
          </div>
          <div class="form-item">
            <label for="peso" class="label-item">Peso (Kg)</label>
            <input type="text" class="input-item" name="peso">
          </div>
        </div>
        <div class="buttom-item buttom-container">
          <input type="submit" value="Criar carta">
          <a href="./main.php">Cancelar</a>
        </div>
    </form>
  </main>

  <footer>
    <?php
      include "../components/footer/index.php";
    ?>
  </footer>
</body>
</html>