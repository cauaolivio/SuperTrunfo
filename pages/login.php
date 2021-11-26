<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../components/initialHeader/styles.css">
  <link rel="stylesheet" href="../components/footer/styles.css">

  <script src="https://kit.fontawesome.com/2a358d9687.js" crossorigin="anonymous"></script>

  <title>Login | SuperTrunfo</title>
</head>
<body>
  <header>
    <?php
      include "../components/initialHeader/index.php";
    ?>
  </header>

  <main class="content-main">
    <h2>Faça seu login</h2>
    
    <form action="../database/loginUser.php" method="POST">
        <div class="form-item">
          <label for="email" class="label-item">Email</label>
          <input type="email" class="input-item" name="email">
        </div>
        <div class="form-item">
          <label for="senha" class="label-item">Senha</label>
          <input type="password" class="input-item" name="senha">
        </div>
        <div class="buttom-item">
          <input type="submit" value="Entrar">
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