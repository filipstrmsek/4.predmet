<?php
session_start();
include "baza.php";

$id = $_GET["id"];
$akcija = $_GET["akcija"];

if ($akcija == "plus") {
    mysqli_query($conn, "UPDATE KOSARICA_IZDELKI SET Kolicina = Kolicina + 1 WHERE id = $id");
} else {
    $result = mysqli_query($conn, "SELECT Kolicina FROM KOSARICA_IZDELKI WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if ($row["Kolicina"] <= 1) {
        mysqli_query($conn, "DELETE FROM KOSARICA_IZDELKI WHERE id = $id");
    } else {
        mysqli_query($conn, "UPDATE KOSARICA_IZDELKI SET Kolicina = Kolicina - 1 WHERE id = $id");
    }
}

header("Location: kosarica.php");
exit();
?>