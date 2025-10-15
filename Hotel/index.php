<?php
# Importation des classes nécessaires
require_once "Customer.php";
require_once "Hotel.php";
require_once "Room.php";
require_once "Reservation.php";

# Création des hotels
$hilton = new Hotel(1, "Hilton **** Strasbourg", "10 route de la Gare", 67000, "STRASBOURG");
$regent = new Hotel(2, "Regent **** Paris", "1 rue de Rivoli", 75001, "PARIS");

# Création des chambres du Hilton
$r1 = new Room(1, 120, false, true, 2, $hilton);
$r2 = new Room(2, 120, false, true, 2, $hilton);
$r3 = new Room(3, 120, false, false, 2, $hilton);
$r4 = new Room(4, 120, false, true, 2, $hilton);
$r16 = new Room(16, 300, true, true, 2, $hilton);
$r17 = new Room(17, 300, true, true, 2, $hilton);
$r18 = new Room(18, 300, true, true, 2, $hilton);
$r19 = new Room(19, 300, true, true, 2, $hilton);

# Création des clients
$virgile = new Customer(1, "Virgile", "Gibello", []);
$micka   = new Customer(2, "Micka", "Murmann", []);

# Création des réservations
$res1 = new Reservation($virgile, $r17, "2021-01-01", "2021-01-01");
$res2 = new Reservation($micka, $r3, "2021-03-11", "2021-03-15");
$res3 = new Reservation($micka, $r4, "2021-04-01", "2021-04-17");

# Fonctions d'affichage

# Affiche toutes les réservations d'un hotel
function resHotel(Hotel $hotel) {

    echo "<h3>Réservations pour l'hotel : {$hotel->getName()}</h3>";

    # Crée un tableau pour stocker toutes les réservations de chaque chambre
    $reservations = [];
    # Parcourt chaque chambre de l'hotel
    foreach ($hotel->getRooms() as $room) {
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
        echo "$resCountHotel réservation(s)";
        # Si au moins une réservation existe, on affiche la liste
        echo "<ul>";
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

# Affiche toutes les réservations d'un client
function resCustomer(Customer $customer) {

    echo "<h3>Réservations de {$customer->getFirstName()} {$customer->getLastName()}</h3>";

    # Récupère toutes les réservations du client
    $reservations = $customer->getReservations();

    # Défini une variable qui va compter le nombre de réservations
    $resCountCustomer = count($reservations);
    echo "$resCountCustomer réservation(s)";

    # Vérifie si le client n'a aucune réservation
    if ($resCountCustomer == 0) {
        echo "<p>Ce client n'a pas de réservation.</p>";
    } else {
        # Si des réservations existent, on parcourt chacune d'elles
        echo "<ul>";
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
                Hotel : {$hotel->getName()}<br>
                Chambre {$room->getIdRoom()} (Lits : {$room->getNbBed()} - {$room->getPrice()}€ - Wifi : {$wifi})<br>
                Date entrée : {$reservation->getDateStart()}<br>
                Date sortie : {$reservation->getDateEnd()}<br>
                Total : {$total} €
            </li><br>";
        }
        echo "</ul>";
    }
}

# Affiche la liste des chambres d'un hotel
function roomsHotel(Hotel $hotel) {

    # Récupère la liste des chambres de l'hotel
    $rooms = $hotel->getRooms();

    # Défini une variable qui va compter le nombre de chambres
    $roomsCount = count($rooms);

    echo "<h3>Chambres de l'hotel : {$hotel->getName()}</h3>";

    # Vérifie si l'hotel n'a aucune chambre
    if ($roomsCount == 0) {
        echo "<p>Cet hotel n'a pas de chambres.</p>";
    } else {
        # Si des chambres existent, création du tableau d'affichage
        echo "<table>
            <tr>
                <th>Chambre</th>
                <th>Prix</th>
                <th>Wifi</th>
                <th>État</th>
                <th>Nombre de lits</th>
            </tr>";

        # Parcourt toutes les chambres de l'hotel
        foreach ($rooms as $room) {
            # Détermine si la chambre dispose du wifi
            $wifi = $room->getWifi() ? "Oui" : "Non";

            # Détermine si la chambre est disponible ou réservée
            $etat = $room->getState() ? "Disponible" : "Réservée";

            # Affiche chaque ligne du tableau pour une chambre
            echo "<tr>
                <td>Chambre {$room->getIdRoom()}</td>
                <td>{$room->getPrice()} €</td>
                <td>{$wifi}</td>
                <td>{$etat}</td>
                <td>{$room->getNbBed()}</td>
            </tr>";
        }

        echo "</table><br>";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appli Exo hotel</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>
                Gestion de réservations de chambre d'hotel
            </h1>
            <nav>

            </nav>
        </header>
        <main>
            <h2>
                Affichage des reservations par hotel
            </h2>
                <?php
                resHotel($hilton);
                resHotel($regent);
                ?>

            <h2>
                Affichage des reservations par client
            </h2>
                <?php
                resCustomer($virgile);
                resCustomer($micka);
                ?>
            <h2>
                Affichage des chambres par hotel
            </h2>
                <?php
                roomsHotel($hilton);
                roomsHotel($regent);
                ?>
        </main>
        <footer>

        </footer>
    </div>
</body>
</html>