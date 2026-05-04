<?php session_start(); ?>
<?php include "baza.php" ?>
<?php include "Header.php" ?>


    <section class="prva">
        <div class="prva-text">
            <h2>Sveža hrana vsak dan</h2>
        </div>

        <div class="prva-features">
            <div class="feature">5000+ izdelkov</div>
            <div class="feature">Sveže dnevne dobave</div>
            <div class="feature">Brezplačna dostava nad 50€</div>
            <div class="feature">100% ekološko</div>
        </div>
    </section>

<?php include "Kategorije.html" ?>

    <section class="products">
        <h3>Izbrani izdelki</h3>
        <div class="product-list">
            <?php
            $sql = "SELECT * FROM IZDELKI ORDER BY RAND() LIMIT 6";
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