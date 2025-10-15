<?php
Class Hotel {          
    # Attributs 
    private int $_idHotel;
    private string $_name;
    private string $_adress;
    private int $_postalCode;
    private string $_city;
    private array $_rooms;


    # Constructeur
    public function __construct($idHotel, $name, $adress, $postalCode, $city){
        $this->_idHotel = $idHotel;             
        $this->_name = $name;              
        $this->_adress = $adress; 
        $this->_postalCode = $postalCode;
        $this->_city = $city;
        $this->_rooms = [];     
    }

    # toString
    public function __toString() {
        return "{$this->_idHotel}<br>
        {$this->_name}<br>
        {$this->_adress}<br>
        {$this->_postalCode}<br>
        {$this->_city}<br>";
    }

    # Getters
    public function getIdHotel() {
        return $this->_idHotel;
    }

    public function getName() {
        return $this->_name;
    }

    public function getAdress() {
        return $this->_adress;
    }

    public function getPostalCode() {
        return $this->_postalCode;
    }

    public function getCity() {
        return $this->_city;
    }

    public function getRooms() {
        return $this->_rooms;
    }

    # Setters
    public function setIdHotel($idHotel) {
        $this->_idHotel = $idHotel;
    }

    public function setName($name) {
        $this->_name = $name;
    }

    public function setAdress($adress) {
        $this->_adress = $adress;
    }

    public function setPostalCode($postalCode) {
        $this->_postalCode = $postalCode;
    }

    public function setCity($city) {
        $this->_city = $city;
    }

    public function addRoom($room){
        $this->_rooms[] = $room; 
    }

}

?>