<?php
  session_start();
  include_once "connection.php";

  if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $password = $_POST['senha'];

    $qry = "SELECT * FROM usuario WHERE email = '$email' AND senha = MD5('$password')";
    $res = mysqli_query($conn, $qry);
    
    if(mysqli_num_rows($res) > 0){
      if ($row = mysqli_fetch_assoc($res)) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        mysqli_close($conn);
        header("Location: ../pages/main.php");
      }
    }
  } else {
    mysqli_close($conn);
    header("Location: ../pages/login.php");
  }
?>