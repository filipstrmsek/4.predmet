<?php
session_start();
include "baza.php";

if (!isset($_SESSION["uporabnik_id"])) {
    header("Location: prijava.php");
    exit();
}

$uporabnik_id = $_SESSION["uporabnik_id"];
$izdelek_id = $_GET["izdelek_id"];

// Preveri ce uporabnik ze ima kosarico
$sql = "SELECT * FROM KOSARICA WHERE uporabnik_id = $uporabnik_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    // Ustvari novo kosarico
    mysqli_query($conn, "INSERT INTO KOSARICA (uporabnik_id) VALUES ($uporabnik_id)");
    $kosarica_id = mysqli_insert_id($conn);
} else {
    $kosarica = mysqli_fetch_assoc($result);
    $kosarica_id = $kosarica["id"];
}

// Preveri ce je izdelek ze v kosarico
$sql = "SELECT * FROM KOSARICA_IZDELKI WHERE kosarica_id = $kosarica_id AND izdelek_id = $izdelek_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Povecaj kolicino
    mysqli_query($conn, "UPDATE KOSARICA_IZDELKI SET Kolicina = Kolicina + 1 WHERE kosarica_id = $kosarica_id AND izdelek_id = $izdelek_id");
} else {
    // Dodaj nov izdelek
    mysqli_query($conn, "INSERT INTO KOSARICA_IZDELKI (kosarica_id, izdelek_id, Kolicina) VALUES ($kosarica_id, $izdelek_id, 1)");
}

header("Location: kosarica.php");
exit();
?>