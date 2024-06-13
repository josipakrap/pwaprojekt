<?php
session_start();
include 'connect.php';

$korisnicko_ime = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];

$sql = "SELECT lozinka, razina FROM korisnici WHERE korisnicko_ime=?";
$stmt = mysqli_stmt_init($dbc);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $hashed_password, $razina);
        mysqli_stmt_fetch($stmt);

        if (password_verify($lozinka, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['korisnicko_ime'] = $korisnicko_ime;
            $_SESSION['razina'] = $razina;
            header('Location: indeks.php');
            exit();
        } else {
            echo "Neispravna lozinka.";
        }
    } else {
        echo "Neispravno korisničko ime.";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
}

mysqli_stmt_close($stmt);
mysqli_close($dbc);
?>
