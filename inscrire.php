<?php
session_start();
require_once "connDB.php";
$query = $connection->query("select * form DescriptionVoyage");
$data = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="">ID</label>

  <label for="">Ville depart</label>
  <select name="villeD">
    <?php
    foreach ($data as $row) {
      echo "<option value = " . $row['villeD'] . " >" . $row['villeD'] . "</option>";
    }
    ?>
  </select>
  <select name="villeA">
    <?php
    foreach ($data as $row) {
      echo "<option value = " . $row['villeA'] . " >" . $row['villeA'] . "</option>";
    }
    ?>
  </select>
  <label for="">Nombre personne</label>
  <input type="number" name="nbrePlace">

  <label for="">Date voyage </label>
  <input type="datetime" name="dateVoy">
  <input type="submit" value="Inscrire" name="Inscrire">

</form>
<?php

$DescQuery = $connection->prepare("select codeDesc from Description where villeD =? and villeA =?");
$DescQuery->execute([$_POST['villeD'], $_POST['villeA']]);
$CodeDescData = $DescQuery->fetch(PDO::FETCH_ASSOC);
$codeDesc = $CodeDescData['codeDesc'];


$VoyageQuery = $connection->prepare("Insert into voyage(codeTrans, codeDesc, prixTicket, duree, heureDpart) values (1, ?,22, 15, 11.20)");
$VoyageQuery->execute([$codeDesc]);

$VoyageQuery = $connection->query("select codeVoyage from voyage where codeVoyage = max(codeVoyage)");
$VoyageQueryData = $VoyageQuery->fetch(PDO::FETCH_ASSOC);
$codeVoyage = $VoyageQueryData['codeVoyage'];



$empQuery = $connection->prepare("select codeEmp from employe where user =? and pwd = ?");
$empQuery->execute([$_SESSION["user"], $_SESSION["pwd"]]);
$empData = $empQuery->fetch(PDO::FETCH_ASSOC);
$codeEmp = $empData['codeEmp'];

$inscriptionQuery = $connection->prepare("Insert into inscription(codeEmp, codeVoyage, nbrePers, dateVoy) values (?,?,?,?)");
$inscriptionQuery->execute([$codeEmp, $codeVoyage, $_POST["nbrePlace"], $_POST["datevoy"]]);










