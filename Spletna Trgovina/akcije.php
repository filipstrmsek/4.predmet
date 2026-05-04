<?php include "baza.php" ?>
<?php include "Header.php";
session_start();?>

<section class="products">
    <h1>Akcijska ponudba</h1>
    <div class="product-list">

        <?php
        $sql = "SELECT * FROM IZDELKI WHERE je_akcija = 1";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="product-card">
                <div class="product-image">
                    <img src="' . $row["slika"] . '" width="100">
                </div>
                <div class="product-info">
                    <p class="product-name">' . $row["ime_izdelka"] . '</p>
                    <p class="product-price">
                        <span class="stara-cena">' . $row["Cena"] . '€</span>
                        <span class="nova-cena">' . $row["cena_akcije"] . '€</span>
                    </p>
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
