<?php
  session_start();
  include_once "../database/connection.php";
  $id = $_SESSION['id'];
  $qry = "SELECT * FROM carta_usuario WHERE id_usuario = $id";
  $res = mysqli_query($conn, $qry);

  if (mysqli_num_rows($res) > 0) {
?>
<div class="table-cards">
  <div class="table-cards-header">
    <span>Nome</span>
    <span>Potência</span>
    <span>Motor</span>
    <span>Vel. Máx.</span>
    <span>0 km/h a 100 km/h</span>
    <span>Peso</span>
  </div>
  <div class="table-cards-body">
    <?php
      while ($row = mysqli_fetch_assoc($res)) {
    ?>
    <div class="table-cards-item">
      <span><?php echo $row['nome'] ?></span>
      <span><?php echo $row['potencia'] ?> CV</span>
      <span><?php echo $row['motor'] ?></span>
      <span><?php echo $row['velocidade_maxima'] ?> Km/h</span>
      <span><?php echo $row['tempo_zero_cem'] ?> seg</span>
      <span><?php echo $row['peso'] ?> Kg</span>
      <a href="../pages/editCard.php?id=<?php echo $row["id"]; ?>"><img src="../assets/editIcon.png" alt="Ícone editar"></a>
      <a href="../database/deleteCard.php?id=<?php echo $row["id"]; ?>"><img src="../assets/removeIcon.png" alt="Ícone remover"></a>
    </div>
    <?php
      }
    ?>
  </div>
</div>
<?php
  } else {
    echo '<span class="alert">Você ainda não possui nenhuma carta</span>';
  }
?>