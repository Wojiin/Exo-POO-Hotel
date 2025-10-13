<?php
Class Room {
//Attributs 
private int $_idRoom;
private float $_price;
private bool $_wifi;
private bool $_state;
private int $_nbBed;
private Hotel $_hotel;
private array $_reservations;

//Constructeur
public function __construct($idRoom, $price, $wifi, $_state, $_nbBed, Hotel $_hotel, $_reservations){
    $this->_idRoom = $idRoom;             
    $this->_price = $price;              
    $this->_wifi = $wifi; 
    $this->_status = $state;
    $this->_nbBed = $_nbBed;
    $this->_hotel = $_hotel;
    $this->_reservations = [];
    }
//toString
public function __toString() {
    return "{$this->_idRoom}{$this->_price} {$this->_wifi}{$this->_state}{$this->_nbBed}";
    }

//Getters
public function getIdRoom() {
    return $this->_idRoom;
    }

public function getPrice() {
    return $this->_price;
    }

public function getWifi() {
    return $this->_wifi;
    }

public function getStatus() {
    return $this->_status;
    }

public function getNbBed() {
    return $this->_nbBed;
    }

public function getReservations(){
    return $this->_reservations;
    }

//Setters
public function setIdRoom($idRoom) {
    $this->_idRoom = $idRoom;
    }

public function setPrice($price) {
    $this->_price = $price;
    }

public function setWifi(bool $wifi) {
    $this->_wifi = $wifi;
    }

public function setStatus($state) {
    $this->_state = $state;
    }

public function setNbBed($nbBed) {
    $this->_nbBed = $nbBed;
    }

public function addReservation($reservations){
    $this->_reservations[] = $reservations;
    }
}
