<?php
$host = "localhost";
$uporabnisko_ime = "root";
$geslo = "";
$baza = "spletnatrgovina";

$conn = mysqli_connect($host, $uporabnisko_ime, $geslo, $baza);

if (!$conn) {
    die("Povezava z bazo ni uspela: " . mysqli_connect_error());
}
?>