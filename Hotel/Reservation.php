<?php 

class Reservation{

    private Customer $_customer;
    private Room $_room;
    private DateTime $_date_start;
    private DateTime $_date_end;

    public function __construct(Customer $customer, Room $room, $date_start,  $date_end){
        $this->_customer = $customer;
        $this->_room = $room;
        $this->_date_start = $date_start;
        $this->_date_end = $date_end;
        $customer->addReservation($this);
        $room->addReservation($this);
    }

    //Getter
    public function getCustomer(){
        return $this->_customer;
    }
    public function getRoom(){
        return $this->_room;
    } 
    public function getDateStart(){
        return $this->_date_start;
    }
    public function getDateEnd(){
        return $this->_date_end;
    }

    //Setter
    public function setCustomer($customer){
        $this->_customer = $customer;
    }

    public function setRoom($room){
        $this->_room = $room;
    }

    public function setDateStart($date){
        $this->_date_debut = $date;
    }

    public function setDateEnd($date){
        $this->_date_start = $date;
    }    
}
?>