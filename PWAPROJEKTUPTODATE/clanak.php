<?php

$conn = new mysqli('localhost', 'root', '', 'baza');

if ($conn->connect_error) {
    die("Povezivanje nije uspjelo: " . $conn->connect_error);
}


$id = intval($_GET['id']);
$sql = "SELECT * FROM vijesti WHERE id = $id";
$result = $conn->query($sql);
$clanak = $result->fetch_assoc();
?>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,900;1,900&family=Work+Sans:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="slike/punch.png" width="50px"/><h1>Fight World TV</h1>
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
        <section class="clanakk">
            <h3 class="naslovv"><?php echo htmlspecialchars($clanak['kategorija']); ?></h3>
            <h3><?php echo htmlspecialchars($clanak['naslov']); ?></h3>
            <p>Objavljeno <?php echo date('d.m.Y. \u H:i', strtotime($clanak['datum'])); ?></p>
            <center><img src="uploads/<?php echo htmlspecialchars($clanak['slika']); ?>"/></center><br><br>
            <p><?php echo nl2br(htmlspecialchars($clanak['tekst'])); ?></p>
        </section>
    </main>
    <footer>
        <p>Stranice mreže grupe Fight World TV</p>
        <p>&copy; Fight World TV</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
