<?php
  session_start();
  include_once "connection.php";
  include_once "../class/user.php";

  if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['senha'];
  
    $qry = "SELECT * FROM usuario WHERE email = '$email'";
    $res = mysqli_query($conn, $qry);
  
    if (mysqli_num_rows($res) > 0) {
      $_SESSION['erro'] = "Este email já está em uso";
      header("Location: ../index.php");
    } else {
      unset($_SESSION['erro']);
      $sql = "INSERT INTO usuario(nome, email, senha) VALUES('$name', '$email', MD5('$password'))";
      if(mysqli_query($conn, $sql)){
        $user = new Usuario($name, $email, $password);
        mysqli_close($conn);
        header("Location: ../pages/login.php");
      }else {
        echo "<script type='javascript'>alert('Erro". $sql ." | ". mysqli_error($conn) ."')";
        mysqli_close($conn);
      }
    }
  }else {
    $_SESSION['erro'] = "Preencha todos os campos abaixo";

    mysqli_close($conn);
    header("Location: ../index.php");
  }
?>
