<?php
session_start();
include "baza.php";

if (!isset($_SESSION["uporabnik_id"])) {
    header("Location: prijava.php");
    exit();
}

$uporabnik_id = $_SESSION["uporabnik_id"];

// Najdi kosarico
$sql = "SELECT * FROM KOSARICA WHERE uporabnik_id = $uporabnik_id";
$result = mysqli_query($conn, $sql);
$kosarica = mysqli_fetch_assoc($result);
?>

<?php include "Header.php" ?>

<section class="kosarica">
    <h1>Košarica</h1>

    <?php if (!$kosarica) { ?>
        <p style="text-align:center;">Košarica je prazna!</p>
    <?php } else { 
        $kosarica_id = $kosarica["id"];
        $sql = "SELECT KOSARICA_IZDELKI.*, IZDELKI.ime_izdelka, IZDELKI.Cena 
                FROM KOSARICA_IZDELKI 
                JOIN IZDELKI ON KOSARICA_IZDELKI.izdelek_id = IZDELKI.Id 
                WHERE KOSARICA_IZDELKI.kosarica_id = $kosarica_id";
        $result = mysqli_query($conn, $sql);

        $skupaj = 0;

        while ($row = mysqli_fetch_assoc($result)) { 
            $skupaj += $row["Cena"] * $row["Kolicina"];
        ?>
        <div class="kosarica-item">
            <p class="item-ime"><?php echo $row["ime_izdelka"]; ?></p>
            <div class="item-kolicina">
                <a href="kosarica_kolicina.php?id=<?php echo $row['id']; ?>&akcija=minus"><button>-</button></a>
                <span><?php echo $row["Kolicina"]; ?></span>
                <a href="kosarica_kolicina.php?id=<?php echo $row['id']; ?>&akcija=plus"><button>+</button></a>
            </div>
            <p class="item-cena"><?php echo $row["Cena"] * $row["Kolicina"]; ?>€</p>
            <a href="odstrani_kosarico.php?id=<?php echo $row['id']; ?>"><button class="item-odstrani">✕</button></a>
        </div>
        <?php } ?>

        <p style="text-align:right; margin-right:40px; font-size:20px; font-weight:bold;">
            Skupaj: <?php echo round($skupaj, 2); ?>€
        </p>

        <a href="oddaj_narocilo.php"><button class="oddaj-narocilo">Oddaj naročilo</button></a>
    <?php } ?>

</section>

<?php include "footer.html" ?>