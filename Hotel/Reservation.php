<?php 
Class Reservation{
    # Attributs
    private Customer $_customer;
    private Room $_room;
    private string $_dateStart;
    private string $_dateEnd;

    # Constructeur
    public function __construct(Customer $customer, Room $room, $dateStart, $dateEnd){
        $this->_customer = $customer;
        $this->_room = $room;
        $this->_dateStart = $dateStart;
        $this->_dateEnd = $dateEnd;
        $customer->addReservation($this);
        $room->addReservation($this);
    }

    # toString
    public function __toString(){
        return "Client :{$this->_customer}<br>
        {$this->_room}<br>
        Date début : {$this->_dateStart}<br>
        Date fin : {$this->_dateEnd}<br>";
    }

    # Getter
    public function getCustomer(){
        return $this->_customer;
    }

    public function getRoom(){
        return $this->_room;
    }

    public function getDateStart(){
        return $this->_dateStart;
    }

    public function getDateEnd(){
        return $this->_dateEnd;
    }

    # Setter
    public function setCustomer($customer){
        $this->_customer = $customer;
    }

    public function setRoom($room){
        $this->_room = $room;
    }

    public function setDateStart($date){
        $this->_dateStart = $date;
    }

    public function setDateEnd($date){
        $this->_dateEnd = $date;
    }
    
}

?>