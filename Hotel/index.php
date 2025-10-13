<?php
require_once "Customer.php";
require_once "Hotel.php";
require_once "Room.php";
require_once "Reservation.php";

$hilton = new Hotel(1, "Hilton **** Strasbourg", "10 route de la Gare", 67000, "STRASBOURG", []);
$regent = new Hotel(2, "Regent **** Paris", "1 rue de Rivoli", 75001, "PARIS", []);

// Ajout des chambres à l'hôtel Hilton
$room1 = new Room(1, 120, false, true, 2, $hilton, []);
$room2 = new Room(2, 120, false, true, 2, $hilton, []);
$room3 = new Room(3, 120, false, true, 2, $hilton, []);
$room4 = new Room(4, 120, false, true, 2, $hilton, []);
$room16 = new Room(16, 300, true, true, 2, $hilton, []);
$room17 = new Room(17, 300, true, true, 2, $hilton, []);
$room18 = new Room(18, 300, true, true, 2, $hilton, []);
$room19 = new Room(19, 300, true, true, 2, $hilton, []);

$hilton->addRoom($room1);
$hilton->addRoom($room2);
$hilton->addRoom($room3);
$hilton->addRoom($room4);
$hilton->addRoom($room16);
$hilton->addRoom($room17);
$hilton->addRoom($room18);
$hilton->addRoom($room19);

// Clients
$virgile = new Customer(1, "Virgile", "Gibello", []);
$micka = new Customer(2, "Micka", "Murmann", []);

// Réservations
$res1 = new Reservation($virgile, $room17, new DateTime("2021-01-01"), new DateTime("2021-01-01"));
$res2 = new Reservation($micka, $room3, new DateTime("2021-03-11"), new DateTime("2021-03-11"));
$res3 = new Reservation($micka, $room4, new DateTime("2021-04-01"), new DateTime("2021-04-01"));

?>
