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
    <title>Kategorija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <div class="header-left">
            <img src="slike/punch.png" width="50px"/>
            <h1>Fight World TV</h1>
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

        $kategorija = $_GET['kategorija'];
        $sql = "SELECT id, naslov, slika, sazetak, datum FROM vijesti WHERE kategorija='$kategorija' AND arhiva=0 ORDER BY datum DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<section class='kategorija'>";
                echo "<div class='article-container'>";
                echo "<article>";
                echo "<a href='clanak.php?id=" . $row["id"] . "'><h3>" . $row["naslov"] . "</h3></a>";
                echo "<p>Objavljeno: " . $row["datum"] . "</p>";
                echo "<center><img class='kslika' src='uploads/" . $row["slika"] . "'/></center>";
                echo "<br><br><p>" . $row["sazetak"] . "</p>";
                echo "</article>";
                echo "</div></section>";
            }
        } else {
            echo "<section>";
            echo "Nema dostupnih vijesti u ovoj kategoriji.";
            echo "</section>";
        }

        $conn->close();
        ?>
    </main>
    <footer>
        <p>Stranice mreže grupe Fight World TV</p>
        <p>&copy; Fight World TV</p>
    </footer>
</body>
</html>