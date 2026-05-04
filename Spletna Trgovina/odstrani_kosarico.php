<?php
session_start();
include "baza.php";

$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM KOSARICA_IZDELKI WHERE id = $id");

header("Location: kosarica.php");
exit();
?>