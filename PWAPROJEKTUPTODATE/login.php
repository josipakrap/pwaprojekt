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
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
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
        <section>
            <center><h2>Prijava</h2></center>
            <form action="skripta_prijava.php" method="post">
                <label for="korisnicko_ime">Korisničko ime:</label><br>
                <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br><br>
                
                <label for="lozinka">Lozinka:</label><br>
                <input type="password" id="lozinka" name="lozinka" required><br><br>
                
                <input type="submit" value="Prijavi se">
            </form>
            <p>Nemate račun? <a href="registracija.php">Registrirajte se</a></p>
        </section>
    </main>
    <footer>
        <p>Stranice mreže grupe Fight World TV</p>
        <p>&copy; Fight World TV</p>
    </footer>
</body>
</html>
