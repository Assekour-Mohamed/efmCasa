<?php 
abstract class Transport
{
  public $Idtrans;
  public $Vitess;
  public $Capacity;

  public function __construct($idtrans, $Vitess, $Capacity)  
  {
    $this->Idtrans = $idtrans;
    $this->Vitess = $Vitess;
    $this->Capacity = $Capacity;
  }
  public function info()
  {
    return "Id : ". $this->Idtrans." , Vitess : ". $this->Vitess ." , Capacity : ". $this->Capacity ;
  }
  abstract public function montant($NombreTicketVondu);

}
