<?php
include 'unos.php';
include 'connect.php';

$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];
$sazetak = $_POST['sazetak'];
$kategorija = $_POST['kategorija'];
$arhiva = isset($_POST['arhiva']) ? 1 : 0;

if (isset($_FILES['slika']) && $_FILES['slika']['error'] === UPLOAD_ERR_OK) {
    $photoTmpName = $_FILES['slika']['tmp_name'];
    $photoDestination = 'uploads/' . $_FILES['slika']['name'];
}

    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upisana Vijest</title>
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
            <li><a href="unos.html">Unos</a></li>
            <li><a href="administrator.php">Administracija</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <?php
                echo "<p>Nova vijest je uspješno dodana.</p>";
                ?>
            <a href="indeks.php">Povratak na početnu stranicu</a>
        </section>
    </main>
    <footer>
        <p>Stranice mreže grupe Fight World TV</p>
        <p>&copy; Fight World TV</p>
    </footer>
</body>
</html>
