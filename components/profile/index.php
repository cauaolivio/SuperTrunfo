<div class="profile-container">
  <div class="profile-data">
  <img class="user-icon" src="../assets/userBig.png" alt="Icone usuário">
  <div>
    <span>
      <?php
        session_start();
        include_once "../database/connection.php";
        
        echo $_SESSION['nome'];
        echo "<br>";
        echo $_SESSION['email'];
        ?>
    </span>
    <a href="../database/logoutUser.php">
      <img src="../assets/exitIcon.png" alt="Icone sair">
    </a>
  </div>
</div>
<?php
  $id = $_SESSION['id'];
  $qry = "SELECT * FROM partida WHERE id_usuario = $id";
  $res = mysqli_query($conn, $qry);

  if (mysqli_num_rows($res) > 0) {
?>
<div class="table-matchs">
    <div class="table-matchs-header">
      <span>Data</span>
      <span>Hora</span>
      <span>Status</span>
    </div>
    <div class="table-matchs-body">
      <?php
        while ($row = mysqli_fetch_assoc($res)) {
      ?>
      <div class="table-matchs-item">
        <span><?php echo date("d/m/Y", strtotime(str_replace('-', '/', $row['data']))) ?></span>
        <span><?php echo $row['hora'] ?></span>
        <?php
          if ($row['status'] == 'vitoria') {
            echo '<span class="victory"> Vitória </span>'; 
          }else{
            echo '<span class="defeat"> Derrota </span>'; 
          }
        ?>
      </div>
      <?php
        }
      ?>
    </div>
    <?php
      } else {
        echo '<span class="alert">Você ainda não jogou nenhuma partida</span>';
      }
    ?>
    
  </div>
</div>