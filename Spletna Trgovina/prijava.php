<?php
session_start();
include "baza.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $geslo = $_POST["geslo"];

    $sql = "SELECT * FROM UPORABNIKI WHERE email = '$email' AND geslo = '$geslo'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $uporabnik = mysqli_fetch_assoc($result);
        $_SESSION["uporabnik_id"] = $uporabnik["id"];
        $_SESSION["ime"] = $uporabnik["ime"];
        header("Location: Index.php");
    } else {
        $napaka = "Napačen email ali geslo!";
    }
}
?>

<?php include "Header.php" ?>

<section class="racun">
    <h1>Prijava</h1>

    <div class="racun-form">

        <?php if (isset($napaka)) { ?>
            <p style="color:red; text-align:center;"><?php echo $napaka; ?></p>
        <?php } ?>

        <form method="POST">
            <div class="racun-row">
                <label>E-naslov</label>
                <input type="email" name="email">
            </div>

            <div class="racun-row">
                <label>Geslo</label>
                <input type="password" name="geslo">
            </div>

            <button class="posodobi-btn" type="submit">Prijava</button>
        </form>

        <p style="text-align:center; margin-top:15px;">
            Nimaš računa? <a href="registracija.php">Registracija</a>
        </p>

    </div>
</section>

<?php include "footer.html" ?>