<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, 'zadanie1');
$qr = $conn->prepare("SELECT `klasa`.`id`, `klasa`.`numer_dziennik`, `klasa`.`imie`, `klasa`.`nazwisko`
FROM `klasa`;");
$qr->execute();
$result = $qr->get_result()
?>