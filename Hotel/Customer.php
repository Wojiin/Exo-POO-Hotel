<?php
Class Customer {
//Attributs 
    private int $_idCustomer;
    private string $_firstName;
    private string $_lastName;
    private array $_reservations;

//Constructeur
public function __construct($idCustomer, $firstName, $lastName, $_reservations){
    $this->_idCustomer = $idCustomer;             
    $this->_firstName = $firstName;              
    $this->_lastName = $lastName;
    $this->_reservations = []; 
    }

//toString
public function __toString(){
    return "{$this->_idCustomer}{$this->_firstName} {$this->_lastName}";
    }

//Getters
public function getIdCustomer(){
    return $this->_idCustomer;
    }

public function getFirstName(){
    return $this->_firstName;
    }

public function getLastName(){
    return $this->_lastName;
    }

public function getReservations(){
    return $this->_reservations;
    }

//Setters
public function setIdCustomer($idCustomer) {
    $this->_idCustomer = $idCustomer;
    }

public function setFirstName($firstName) {
    $this->_firstName = $firstName;
    }

public function setLastName($lastName) {
    $this->_lastName = $lastName;
    }

public function addReservation($reservations){
    $this->_reservations[] = $reservations;
    }

}
?>