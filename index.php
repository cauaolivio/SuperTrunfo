<?php
  session_start();
  if (isset($_SESSION['nome']) && isset($_SESSION['email'])) {
    header("Location: ./pages/main.php");
  } else {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="components/initialHeader/styles.css">
  <link rel="stylesheet" href="components/footer/styles.css">

  <script src="https://kit.fontawesome.com/2a358d9687.js" crossorigin="anonymous"></script>
  
  <title>Cadastro | SuperTrunfo</title>
</head>
<body>
  <header>
    <?php
      include "components/initialHeader/index.php";
    ?>
  </header>

  <main class="content-main">
    <h2>Crie sua conta</h2>
    <?php
      if (isset($_SESSION['erro'])) {
        echo '<span class="alert-error">'. $_SESSION['erro'] .'</span>';
      } 
    ?>
    <form action="./database/saveUser.php" method="POST">
        <div class="form-item">
          <label for="nome" class="label-item">Nome completo</label>
          <input type="text" class="input-item" name="nome">
        </div>
        <div class="form-item">
          <label for="email" class="label-item">Email</label>
          <input type="email" class="input-item" name="email">
        </div>
        <div class="form-item">
          <label for="senha" class="label-item">Senha</label>
          <input type="password" class="input-item" name="senha">
        </div>
        <div class="buttom-item">
          <input type="submit" value="Criar conta">
          <span>Já tem um conta? <a href="./pages/login.php">Faça login</a></span>
        </div>
    </form>
  </main>

  <footer>
    <?php
      include "components/footer/index.php";
    ?>
  </footer>
</body>
</html>

<?php
  }
?>