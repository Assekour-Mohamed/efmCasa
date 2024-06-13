
<?php 
session_start();
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="">ID</label>    
        
        <label for="">User name</label>
        <input type="text" name="user"><br><br>
        <label for="">Password</label>
        <input type="text" name="pwd" ><br><br>
         
        <input type="submit" value="connexion" name ="Connexion">
     
</form>
 
<?php 

require_once("connDb.php");



$query = $connection->prepare("select * from Employee where user =? and pwd =?");
$query->execute([$_POST["user"], $_POST["pwd"]]);

$result = $query->fetch(pdo::FETCH_ASSOC);
if ($result != null)
{
  $_SESSION["user"] = $result["user"];
  $_SESSION["fonction"] = $result["fonction"];
  header("location : menu.php ");
}
else
{
  header("location : connEmp.php ");
}
