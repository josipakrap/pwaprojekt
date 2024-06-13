<?php
session_start();
include 'connect.php';

$loggedIn = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;
$korisnicko_ime = $loggedIn ? $_SESSION['korisnicko_ime'] : '';
$razina = $loggedIn && isset($_SESSION['razina']) ? $_SESSION['razina'] : 0;
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWA Projekt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <div class="header-left">
            <img src="slike/punch.png" width="50px"/>
            <h1>Fight World TV</h1>
        </div>
        <div class="header-right">
            <?php if ($loggedIn): ?>
                <p>Dobrodošli, <?php echo htmlspecialchars($korisnicko_ime); ?></p>
                <a href="odjava.php">Odjava</a>
            <?php else: ?>
                <a href="login.php">Prijava</a>
                <a href="registracija.php">Registracija</a>
            <?php endif; ?>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="indeks.php">Početna</a></li>
            <li><a href="kategorija.php?kategorija=MMA">MMA</a></li>
            <li><a href="kategorija.php?kategorija=Box">Box</a></li>
            <?php if ($razina == 1): ?>
                <li><a href="unos.html">Unos</a></li>
                <li><a href="administrator.php">Administracija</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <main>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "baza";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, naslov, slika, sazetak, kategorija, datum FROM vijesti WHERE arhiva=0 ORDER BY kategorija, datum DESC";
        $result = $conn->query($sql);

        $currentCategory = "";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($currentCategory != $row["kategorija"]) {
                    if ($currentCategory != "") {
                        echo "</div></section>";
                    }
                    $currentCategory = $row["kategorija"];
                    echo "<section class='kategorija'>";
                    echo "<h3>" . $currentCategory . "</h3>";
                    echo "<div class='article-container'>";
                }
                echo "<article>";
                echo "<img src='uploads/" . $row["slika"] . "'/>";
                echo "<a href='clanak.php?id=" . $row["id"] . "'><h3>" . $row["naslov"] . "</h3></a>";
                echo "<p>" . $row["sazetak"] . "</p>";
                echo "</article>";
            }
        } else {
            echo "<section>Nema dostupnih vijesti.</section>";
        }
            echo "</div></section>";


        $conn->close();
        ?>
    </main>
    <footer>
        <p>Stranice mreže grupe Fight World TV</p>
        <p>&copy; Fight World TV</p>
    </footer>
</body>
</html>
