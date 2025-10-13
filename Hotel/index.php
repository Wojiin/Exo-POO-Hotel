<?php
require_once "Customer.php";
require_once "Hotel.php";
require_once "Room.php";
require_once "Reservation.php";

$hilton = new Hotel(1, "Hilton **** Strasbourg", "10 route de la Gare", 67000, "STRASBOURG");
$regent = new Hotel(2, "Regent **** Paris", "1 rue de Rivoli", 75001, "PARIS");


// Chambres Hilton
$r1 = new Room(1, 120, false, true, 2, $hilton);
$r2 = new Room(2, 120, false, true, 2, $hilton);
$r3 = new Room(3, 120, false, false, 2, $hilton);
$r4 = new Room(4, 120, false, true, 2, $hilton);
$r16 = new Room(16, 300, true, true, 2, $hilton);
$r17 = new Room(17, 300, true, true, 2, $hilton);
$r18 = new Room(18, 300, true, true, 2, $hilton);
$r19 = new Room(19, 300, true, true, 2, $hilton);


// Clients
$virgile = new Customer(1, "Virgile", "Gibello", []);
$micka = new Customer(2, "Micka", "Murmann", []);

// Réservations
$res1 = new Reservation($virgile, $r17, "2021-01-01", "2021-01-01");
$res2 = new Reservation($micka, $r3, "2021-03-11", "2021-03-11");
$res3 = new Reservation($micka, $r4, "2021-04-01", "2021-04-01");


//Tests
$hilton -> infosHotel();
?>
