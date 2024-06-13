<?php
include 'connect.php';

if(isset($_FILES['slika']) && $_FILES['slika']['error'] === UPLOAD_ERR_OK) {
    $slika = $_FILES['slika']['name'];
    $naslov = $_POST['naslov'];
    $tekst = $_POST['tekst'];
    $sazetak = $_POST['sazetak'];
    $kategorija = $_POST['kategorija'];
    $arhiva = isset($_POST['arhiva']) ? 1 : 0;

    $target_dir = 'uploads/';
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($slika);

    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
        // Upit za unos podataka u bazu
        $query = "INSERT INTO vijesti (naslov, tekst, slika, sazetak, kategorija, arhiva) VALUES ('$naslov', '$tekst', '$slika', '$sazetak', '$kategorija', '$arhiva')";
        $result = mysqli_query($dbc, $query) or die('Error querying database.');

        mysqli_close($dbc);

        echo "Datoteka ". basename($slika). " je uspješno uploadana.";
    } else {
        echo "Greška pri uploadu datoteke.";
    }
} else {
    echo "Nije odabrana datoteka za upload ili je došlo do greške pri uploadu.";
}
?>
