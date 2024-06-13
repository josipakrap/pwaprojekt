<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['razina'] != 1) {
    header('Location: indeks.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img src="slike/punch.png" width="50px"/>
            <h1>Fight World TV</h1>
        </div>
        <div class="header-right">
            <?php if ($_SESSION['loggedin']): ?>
                <p>Dobrodošli, <?php echo htmlspecialchars($_SESSION['korisnicko_ime']); ?></p>
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
            <?php if ($_SESSION['razina'] == 1): ?>
                <li><a href="unos.html">Unos</a></li>
                <li><a href="administrator.php">Administracija</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <main>
        <section>
        <h3>Administracija Vijesti</h3>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "baza";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $sql = "DELETE FROM vijesti WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            if ($stmt->execute() === TRUE) {
                echo "Vijest je uspješno obrisana.";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $stmt->close();
        }
        
        $sql = "SELECT id, naslov FROM vijesti ORDER BY datum DESC";
        $result = $conn->query($sql);
        echo "<article class='admin'>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p>";
                echo $row["naslov"];
                echo " <a class='gumbb' href='administrator.php?delete=" . $row["id"] . "'>Obriši</a>";
                echo "<a class='gumbb' href='uredi_vijest.php?id=" . $row["id"] . "'>Uredi</a>";
                echo "</p>";
            }
        } else {
            echo "Nema dostupnih vijesti.";
        }
        echo "</article>";
        $conn->close();
        ?>
    </section>
    </main>
    <footer>
        <p>Stranice mreže grupe Fight World TV</p>
        <p>&copy; Fight World TV</p>
    </footer>
</body>
</html>
