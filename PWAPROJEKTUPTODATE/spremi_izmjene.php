<?php
include 'connect.php';

$id = $_POST['id'];
$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];
$kategorija = $_POST['kategorija'];
$arhiva = isset($_POST['arhiva']) ? 1 : 0;

if(isset($_FILES['slika']) && $_FILES['slika']['error'] === UPLOAD_ERR_OK) {
    $slika = $_FILES['slika']['name'];
    $target_dir = 'uploads/';
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($slika);
    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);
    $sql = "UPDATE vijesti SET naslov='$naslov', tekst='$tekst', slika='$slika', kategorija='$kategorija', arhiva='$arhiva' WHERE id='$id'";
} else {
    $sql = "UPDATE vijesti SET naslov='$naslov', tekst='$tekst', kategorija='$kategorija', arhiva='$arhiva' WHERE id='$id'";
}
if ($dbc->query($sql) === TRUE) {
    echo "Vijest je uspješno ažurirana.";
    echo "<a href='kategorija.php?kategorija=" . $kategorija . "'>Povratak na kategoriju</a>";
} else {
    echo "Greška pri ažuriranju vijesti: " . $conn->error;
}

$dbc->close();
?>
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
                echo "<p>Vijest je uspješno ažurirana.</p>";
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

