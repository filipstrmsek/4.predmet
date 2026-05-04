<?php
session_start();
include "baza.php";

if (!isset($_SESSION["uporabnik_id"])) {
    header("Location: prijava.php");
    exit();
}

// Naloži trenutne podatke
$id = $_SESSION["uporabnik_id"];
$sql = "SELECT * FROM UPORABNIKI WHERE id = $id";
$result = mysqli_query($conn, $sql);
$uporabnik = mysqli_fetch_assoc($result);

// Posodobi podatke
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST["ime"];
    $priimek = $_POST["priimek"];
    $email = $_POST["email"];
    $geslo = $_POST["geslo"];

    $update = "UPDATE UPORABNIKI SET ime='$ime', priimek='$priimek', email='$email', geslo='$geslo' WHERE id=$id";
    mysqli_query($conn, $update);

    $_SESSION["ime"] = $ime;
    $sporocilo = "Podatki uspešno posodobljeni!";

    // Ponovno naloži podatke
    $result = mysqli_query($conn, "SELECT * FROM UPORABNIKI WHERE id = $id");
    $uporabnik = mysqli_fetch_assoc($result);
}
?>

<?php include "Header.php" ?>

<section class="racun">
    <h1>Moji podatki</h1>

    <div class="racun-form">

        <?php if (isset($sporocilo)) { ?>
            <p style="color:green; text-align:center;"><?php echo $sporocilo; ?></p>
        <?php } ?>

        <form method="POST">
            <div class="racun-row">
                <label>Ime</label>
                <input type="text" name="ime" value="<?php echo $uporabnik['ime']; ?>">
            </div>

            <div class="racun-row">
                <label>Priimek</label>
                <input type="text" name="priimek" value="<?php echo $uporabnik['priimek']; ?>">
            </div>

            <div class="racun-row">
                <label>E-naslov</label>
                <input type="email" name="email" value="<?php echo $uporabnik['email']; ?>">
            </div>

            <div class="racun-row">
                <label>Geslo</label>
                <input type="password" name="geslo" value="<?php echo $uporabnik['geslo']; ?>">
            </div>

            <button class="posodobi-btn" type="submit">Posodobi podatke</button>
        </form>

    </div>
</section>

<?php include "footer.html" ?>