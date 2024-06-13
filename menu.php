<?php 
session_start();
?>
 
  <?php if (isset($_SESSION['user'])): ?>

    <h1> User  : <?php echo  $_SESSION['user']. "fonction" . $_SESSION['fonction']?> </h1>
    <a href="listvoyage.php">List Voyage</a> <br>
    <a href="logout.php">Deconnexion</a> <br>

  <?php else: ?>
    <a href="connEmp.php">Connexion</a> <br>
  <?php endif; ?>
 