<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../components/profile/styles.css">
  <link rel="stylesheet" href="../components/mainHeader/styles.css">
  <link rel="stylesheet" href="../components/footer/styles.css">

  <script src="https://kit.fontawesome.com/2a358d9687.js" crossorigin="anonymous"></script>

  <title>Perfil  | SuperTrunfo</title>
</head>
<body>
  <header>
    <?php
      include "../components/mainHeader/index.php";
    ?>
  </header>

  <main class="content-main">
    <?php
      include "../components/profile/index.php";
    ?>
  </main>

  <footer>
    <?php
      include "../components/footer/index.php";
    ?>
  </footer>
</body>
</html>