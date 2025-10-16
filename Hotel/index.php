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
$r17 = new Room(17, 300, true, false, 2, $hilton);
$r18 = new Room(18, 300, true, true, 2, $hilton);
$r19 = new Room(19, 300, true, true, 2, $hilton);

# Création des clients
$virgile = new Customer(1, "Virgile", "Gibello", []);
$micka   = new Customer(2, "Micka", "Murmann", []);

# Création des réservations
$res1 = new Reservation($virgile, $r17, "2021-01-01", "2021-01-01");
$res2 = new Reservation($micka, $r3, "2021-03-11", "2021-03-15");
$res3 = new Reservation($micka, $r4, "2021-04-01", "2021-04-17");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.24.2/dist/css/uikit.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.24.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.24.2/dist/js/uikit-icons.min.js"></script>
    <title>Appli Exo hotel</title>
</head>
<body>
    <div class="uk-container">
        <main>
                <?php
                $hilton->resHotel();
                $regent->resHotel();
                $virgile->resCustomer();
                $micka->resCustomer();
                $hilton->roomsHotel();
                $regent->roomsHotel();
                ?>
        </main>
    </div>
</body>
</html>