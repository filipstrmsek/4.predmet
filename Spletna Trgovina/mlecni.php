<?php include "Header.php" ?>
<?php include "baza.php" ?>
<?php session_start(); ?>
<div class="kategorija-banner" style="background-color: #2f80ed;">
    <h1>Mlečni izdelki</h1>
</div>
<section class="products">
    <div class="product-list">

        <?php
        $sql = "SELECT * FROM IZDELKI WHERE kategorija_id = 2";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="product-card">
                <div class="product-image">
                    <img src="' . $row["slika"] . '" width="100">
                </div>
                <div class="product-info">
                    <p class="product-name">' . $row["ime_izdelka"] . '</p>
                    <p class="product-price">Cena: ' . $row["Cena"] . '€</p>
                    <button class="add-to-cart" onclick="dodajVKosarico(' . $row["Id"] . ')">Dodaj v košarico</button>
                </div>
            </div>';
        }
        ?>

    </div>
</section>
<?php include "footer.html" ?>
<script>
function dodajVKosarico(izdelek_id) {
    window.location.href = "dodaj_kosarico.php?izdelek_id=" + izdelek_id;
}
</script>