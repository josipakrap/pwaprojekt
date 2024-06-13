<?php
include 'connect.php';

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$korisnicko_ime = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];
$potvrda_lozinke = $_POST['potvrda_lozinke'];
$razina = $_POST['razina'];

if ($lozinka !== $potvrda_lozinke) {
    echo "Lozinke se ne podudaraju. Pokušajte ponovo.";
    exit();
}

$sql = "SELECT COUNT(*) FROM korisnici WHERE korisnicko_ime = ?";
$stmt = mysqli_stmt_init($dbc);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);

    if ($count > 0) {
        echo "Korisničko ime već postoji. Molimo odaberite drugo korisničko ime.";
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);
        exit();
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
    exit();
}

$hashed_lozinka = password_hash($lozinka, PASSWORD_DEFAULT); 

$sql = "INSERT INTO korisnici (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($dbc);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 'ssssi', $ime, $prezime, $korisnicko_ime, $hashed_lozinka, $razina);
    mysqli_stmt_execute($stmt);

    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['korisnicko_ime'] = $korisnicko_ime;
    $_SESSION['razina'] = $razina;

    header('Location: indeks.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
}

mysqli_stmt_close($stmt);
mysqli_close($dbc);
?>
