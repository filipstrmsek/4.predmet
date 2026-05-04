<?php
session_start();
include "baza.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST["ime"];
    $priimek = $_POST["priimek"];
    $email = $_POST["email"];
    $geslo = $_POST["geslo"];

    $check = "SELECT * FROM UPORABNIKI WHERE email = '$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        $napaka = "Email že obstaja!";
    } else {
        $sql = "INSERT INTO UPORABNIKI (ime, priimek, email, geslo) VALUES ('$ime', '$priimek', '$email', '$geslo')";
        mysqli_query($conn, $sql);

        $result = mysqli_query($conn, "SELECT * FROM UPORABNIKI WHERE email = '$email'");
        $uporabnik = mysqli_fetch_assoc($result);
        $_SESSION["uporabnik_id"] = $uporabnik["id"];
        $_SESSION["ime"] = $uporabnik["ime"];
        header("Location: Index.php");
    }
}
?>

<?php include "Header.php" ?>

<section class="racun">
    <h1>Registracija</h1>

    <div class="racun-form">

        <?php if (isset($napaka)) { ?>
            <p style="color:red; text-align:center;"><?php echo $napaka; ?></p>
        <?php } ?>

        <form method="POST">
            <div class="racun-row">
                <label>Ime</label>
                <input type="text" name="ime">
            </div>

            <div class="racun-row">
                <label>Priimek</label>
                <input type="text" name="priimek">
            </div>

            <div class="racun-row">
                <label>E-naslov</label>
                <input type="email" name="email">
            </div>

            <div class="racun-row">
                <label>Geslo</label>
                <input type="password" name="geslo">
            </div>

            <button class="posodobi-btn" type="submit">Registracija</button>
        </form>

        <p style="text-align:center; margin-top:15px;">
            Že imaš račun? <a href="prijava.php">Prijava</a>
        </p>

    </div>
</section>

<?php include "footer.html" ?>