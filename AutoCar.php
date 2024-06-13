<?php 
require "transport.php";
class AutoCar extends Transport
{
  public $mark;
  public $PrixTicket;
 
  public function __construct($idtrans, $Vitess, $Capacity,$mark, $PrixTicket )  
  {
    parent::__construct($idtrans, $Vitess, $Capacity);
    $this->mark = $mark;
    $this->PrixTicket = $PrixTicket;
   }
  public function info()
  {
    return parent::info(). " , mark : ". $this->mark." , Prix Ticket : ". $this->PrixTicket;
  }
  public function montant($NombreTicketVondu)
  {
    if($NombreTicketVondu >= $this->Capacity)
    { 
      return $NombreTicketVondu * $this->PrixTicket;
    }
    return "the tickets are not selled";
  }
}

$Autocar = new AutoCar("108",280, 22, "BMW", 222.3);
echo "AutoCar info : ". $Autocar->info();
echo "<br><br>";
echo "Montant : " . $Autocar->montant(22);