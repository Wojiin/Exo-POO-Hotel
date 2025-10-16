<?php
Class Customer {
    # Attributs 
    private int $_idCustomer;
    private string $_firstName;
    private string $_lastName;
    private array $_reservations;

    # Constructeur
    public function __construct($idCustomer, $firstName, $lastName, $_reservations){
        $this->_idCustomer = $idCustomer;             
        $this->_firstName = $firstName;              
        $this->_lastName = $lastName;
        $this->_reservations = []; 
    }

    # toString
    public function __toString(){
        return "{$this->_idCustomer}<br>
        {$this->_firstName}<br>
        {$this->_lastName}<br>";
    }

    # Getters
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

    # Setters
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

    # Fonction d'affichage

    # Affiche toutes les réservations d'un client
    public function resCustomer() {

    echo "<h3>Réservations de {$this->_firstName} {$this->_lastName}</h3>";

    # Récupère toutes les réservations du client
    $reservations = $this->_reservations;

    # Défini une variable qui va compter le nombre de réservations
    $resCountCustomer = count($reservations);
    echo "<p style ='background-color : #06e42bff; color : white; width : 115px; border-radius : 5px; text-align : center';>$resCountCustomer réservation(s)</p>";

    # Vérifie si le client n'a aucune réservation
    if ($resCountCustomer == 0) {
        echo "<p>Ce client n'a pas de réservation.</p>";
    } else {
        # Si des réservations existent, on parcourt chacune d'elles
        echo "<ul class='uk-list'>";
        foreach ($reservations as $reservation) {
            # Récupère la chambre et l'hotel associés à la réservation
            $room  = $reservation->getRoom();
            $hotel = $room->getHotel();

            # Calcule la durée du séjour à partir des dates de début et de fin
            $dateEntree = new DateTime($reservation->getDateStart());
            $dateSortie = new DateTime($reservation->getDateEnd());
            $duree = $dateSortie->diff($dateEntree)->days + 1;

            # Calcule le total du séjour (prix de la chambre * nombre de jours)
            $total = $duree * $room->getPrice();

            # Détermine si le wifi est disponible (Oui / Non)
            $wifi = $room->getWifi() ? "Oui" : "Non";

            # Affiche toutes les informations de la réservation
            echo "<li>
                <strong>Hotel : {$hotel->getName()}</strong><br>
                Chambre {$room->getIdRoom()} (Lits : {$room->getNbBed()} - {$room->getPrice()}€ - Wifi : {$wifi})<br>
                Date entrée : {$reservation->getDateStart()}<br>
                Date sortie : {$reservation->getDateEnd()}<br>
                Total : {$total} €
            </li><br>";
            }
            echo "</ul>";
        }
    }

}

?>