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
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .error {
            border: 2px solid red;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
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
            <center><h3>Registracija</h3></center>
            <form id="registrationForm" action="skripta_registracija.php" method="post">
                <label for="ime">Ime:</label><br>
                <input type="text" id="ime" name="ime" required><br><br>
                
                <label for="prezime">Prezime:</label><br>
                <input type="text" id="prezime" name="prezime" required><br><br>
                
                <label for="korisnicko_ime">Korisničko ime:</label><br>
                <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br><br>

                <label for="lozinka">Lozinka:</label><br>
                <input type="password" id="lozinka" name="lozinka" required><br><br>

                <label for="potvrda_lozinke">Potvrda lozinke:</label><br>
                <input type="password" id="potvrda_lozinke" name="potvrda_lozinke" required><br>
                <div id="lozinkaError" class="error-message"></div><br>

                <label for="razina">Razina:</label><br>
                <select id="razina" name="razina" required>
                    <option value="0">Korisnik</option>
                    <option value="1">Administrator</option>
                </select><br><br>
                
                <input type="submit" value="Registriraj se">
            </form>
        </section>
    </main>
    <footer>
        <p>Stranice mreže grupe Fight World TV</p>
        <p>&copy; Fight World TV</p>
    </footer>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            let valid = true;


            document.querySelectorAll('.error-message').forEach(e => e.innerText = '');
            document.querySelectorAll('.error').forEach(e => e.classList.remove('error'));


            const lozinka = document.getElementById('lozinka');
            const potvrda_lozinke = document.getElementById('potvrda_lozinke');
            if (lozinka.value !== potvrda_lozinke.value) {
                valid = false;
                lozinka.classList.add('error');
                potvrda_lozinke.classList.add('error');
                document.getElementById('lozinkaError').innerText = 'Lozinke se ne podudaraju.';
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
