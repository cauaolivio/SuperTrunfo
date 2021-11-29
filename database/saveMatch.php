<?php
  session_start();
  
  include_once "connection.php";
  include_once "../class/match.php";

  if(isset($_POST['date']) && isset($_POST['schedule']) && isset($_POST['status'])){
    $idUser = $_SESSION['id'];
    $date = $_POST['date'];
    $schedule = $_POST['schedule'];
    $status = $_POST['status'];

    $sql = "INSERT INTO partida(id_usuario, data, hora, status) VALUES($idUser, '$date', '$schedule', '$status')";
    
    if(mysqli_query($conn, $sql)){
      $card = new Partida($date, $status);
      mysqli_close($conn);
    }else {
      echo "<script type='javascript'>alert('Erro". $sql ." | ". mysqli_error($conn) ."')";
      mysqli_close($conn);
    }
  }
  $array = ['date' => $_POST['date'], 'schedule' => $_POST['schedule'], 'status' => $_POST['status']];
  echo json_encode($array);
?>