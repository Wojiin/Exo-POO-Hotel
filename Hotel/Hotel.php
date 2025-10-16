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

    # Fonction d'affichage

    # Affiche toutes les réservations d'un hotel
    public function resHotel() {

        echo "<h2>Réservation(s) de l'hotel <strong>{$this->_name}</strong></h2>";

        # Crée un tableau pour stocker toutes les réservations de chaque chambre
        $reservations = [];
        # Parcourt chaque chambre de l'hotel
        foreach ($this->_rooms as $room) {
            # Parcourt chaque réservation associée à la chambre
            foreach ($room->getReservations() as $reservation) {
                # Ajoute la réservation au tableau global
                $reservations[] = $reservation;
            }
        }

        # Défini une variable qui va compter le nombre de réservations
        $resCountHotel = count($reservations);

        # Vérifie si le tableau $reservations est vide
        if ($resCountHotel == 0) {
            echo "<p>Cet hotel n'a pas de réservation.</p>";
        } else {
            echo "<p style ='background-color : #06e42bff; color : white; width : 115px; border-radius : 5px; text-align : center';>$resCountHotel réservation(s)</p>";
            # Si au moins une réservation existe, on affiche la liste
            echo "<ul class='uk-list'>";
            foreach ($reservations as $reservation) {
                # Récupère le client et la chambre concernés
                $client = $reservation->getCustomer();
                $room   = $reservation->getRoom();

                # Affiche une ligne avec les détails de la réservation
                echo "<li>{$client->getFirstName()} {$client->getLastName()}
                    - Chambre {$room->getIdRoom()} - du {$reservation->getDateStart()} au {$reservation->getDateEnd()}</li>";
            }
            echo "</ul><br>";
        }
    }

    # Affiche la liste des chambres d'un hotel
    public function roomsHotel() {

        # Récupère la liste des chambres de l'hotel
        $rooms = $this->_rooms;

        # Défini une variable qui va compter le nombre de chambres
        $roomsCount = count($rooms);

        echo "<h2>Statut des chambres de <strong>{$this->_name}</strong></h2>";

        # Vérifie si l'hotel n'a aucune chambre
        if ($roomsCount == 0) {
            echo "<p>Cet hotel n'a pas de chambres.</p>";
        } else {
            # Si des chambres existent, création du tableau d'affichage
            echo "<table class='uk-table uk-table-striped'>
                <tr>
                    <th>Chambre</th>
                    <th>Prix</th>
                    <th>Wifi</th>
                    <th>État</th>
                    
                </tr>";

            # Parcourt toutes les chambres de l'hotel
            foreach ($rooms as $room) {
                # Détermine si la chambre dispose du wifi
                $wifi = $room->getWifi() ? "<span uk-icon='icon: rss'></span>" : "";

                # Détermine si la chambre est disponible ou réservée
                $etat = $room->getState() ? "<p style ='background-color : #06e42bff; color : white; width : 115px; border-radius : 5px; text-align : center';>Disponible</p>" : "<p style ='background-color : red; color : white; width : 115px; border-radius : 5px; text-align : center';>Réservée</p>";

                # Affiche chaque ligne du tableau pour une chambre
                echo "<tr class ='uk-text-left'>
                    <td>Chambre {$room->getIdRoom()}</td>
                    <td>{$room->getPrice()} €</td>
                    <td>{$wifi}</td>
                    <td style = 'width : 80px';>{$etat}</td>
                    
                </tr>";
            }

            echo "</table><br>";
        }
    }

}

?>