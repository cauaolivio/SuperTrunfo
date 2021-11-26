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

  <title>Editar carta | SuperTrunfo</title>
</head>
<body>
  <header>
    <?php
      include_once "../database/connection.php";

      session_start();
      $id = $_GET['id'];
    
      $qry = "SELECT * FROM carta_usuario WHERE id = $id";
      $res = mysqli_query($conn, $qry);
      if ($res) {
        $row = mysqli_fetch_assoc($res);
      } else {
        echo "<p>Erro: ". $qry ." | ". mysqli_error($conn) ."</p>";
        mysqli_close($conn);
      }

      include "../components/mainHeader/index.php";
    ?>
  </header>

  <main class="content-main">
    <h2>Edite uma carta</h2>
    
    <form action="../database/editCard.php" method="POST">
        <div class="form-line">
          <div class="form-item">
            <label for="nome" class="label-item">Nome</label>
            <input type="text" class="input-item" name="nome" value="<?php echo $row["nome"] ?>">
          </div>
          <div class="form-item">
            <label for="url" class="label-item">Link da imagem</label>
            <input type="url" class="input-item" name="url" value="<?php echo $row["imagem"]?>">
          </div>
        </div>
        <div class="form-line middle">
          <div class="form-item">
            <label for="potencia" class="label-item">Potência (CV)</label>
            <input type="text" class="input-item" name="potencia" value="<?php echo $row["potencia"] ?>">
          </div>
          <div class="form-item">
            <label for="motor" class="label-item">Motor</label>
            <input type="text" class="input-item" name="motor" value="<?php echo $row["motor"] ?>">
          </div>
          <div class="form-item">
            <label for="velMax" class="label-item">Velocidade Máxima (Km/h)</label>
            <input type="text" class="input-item" name="velMax" value="<?php echo $row["velocidade_maxima"] ?>">
          </div>
        </div>
        <div class="form-line">
          <div class="form-item">
            <label for="tempZeroCem" class="label-item">Tempo de 0 km/h a 100 km/h (seg)</label>
            <input type="text" class="input-item" name="tempZeroCem" value="<?php echo $row["tempo_zero_cem"] ?>">
          </div>
          <div class="form-item">
            <label for="peso" class="label-item">Peso (Kg)</label>
            <input type="text" class="input-item" name="peso" value="<?php echo $row["peso"] ?>">
          </div>
        </div>
        <div class="buttom-item buttom-container">
          <input type="hidden" class="input-item" name="id" value="<?php echo $id; ?>"/>
          <input type="submit" value="Editar carta">
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