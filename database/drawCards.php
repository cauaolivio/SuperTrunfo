<?php
  session_start();
  
  include_once "connection.php";
  include_once "../class/card.php";

  $totalCards = 10;
  
  $id = $_SESSION['id'];
  $cards = array();

  $qry = "SELECT * FROM carta_usuario WHERE id_usuario = $id";
  $res = mysqli_query($conn, $qry);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $card = new Carta($row['nome'], $row['imagem'], $row['potencia'], $row['motor'], $row['velocidade_maxima'], $row['tempo_zero_cem'], $row['peso']);
      array_push($cards, $card);
    }
  }

  $qry = "SELECT * FROM carta";
  $res = mysqli_query($conn, $qry);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $card = new Carta($row['nome'], $row['imagem'], $row['potencia'], $row['motor'], $row['velocidade_maxima'], $row['tempo_zero_cem'], $row['peso']);
      array_push($cards, $card);
    }
  }

  $_SESSION['cartas'] = $cards;

  $cardsGame = array();
  $cardsPlayer = array();
  $cardsMachine = array();
  $i = 0;
  while ($i < $totalCards) {
    $x = rand(0, count($_SESSION['cartas'])-1);
    if (!in_array($_SESSION['cartas'][$x], $cardsGame)) {
      array_push($cardsGame, $_SESSION['cartas'][$x]);
      $i ++;
    }
  }
  
  echo json_encode($cardsGame);
?>