
<head>
    <link rel="stylesheet" href="css.css">
</head>

<header class="header">
    <div class="header-top">
        <div class="logo">
            <img src="ikone/shopping-cart-svgrepo-com.svg" width="45">
            <span>Spletna trgovina</span>
        </div>
        <div class="header-icons">
            <a href="kosarica.php">
                <img src="ikone/basket-svgrepo-com.svg" width="35">
                <span>Košarica</span>
            </a>

            <?php if (isset($_SESSION["uporabnik_id"])) { ?>
                <a href="racun.php">
                    <img src="ikone/account-svgrepo-com.svg" width="35">
                    <span><?php echo $_SESSION["ime"]; ?></span>
                </a>
                <a href="odjava.php">
                    <img src="ikone/x_alt.svg" width="35">
                    <span>Odjava</span>
                </a>
            <?php } else { ?>
                <a href="prijava.php">
                    <img src="ikone/account-svgrepo-com.svg" width="35">
                    <span>Prijava</span>
                </a>
            <?php } ?>

        </div>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="Index.php">Domov</a></li>
            <li><a href="akcije.php">Akcije</a></li>
            <li><a href="vsekategorije.php">Vse kategorije</a></li>
            <li><a href="onas.php">O nas</a></li>
        </ul>
    </nav>
</header>