<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uredi Vijest</title>
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
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "baza";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $id = $_GET['id'];
        $sql = "SELECT naslov, tekst, sazetak,slika, kategorija, arhiva FROM vijesti WHERE id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>
        <section>
            <form action="spremi_izmjene.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="naslov">Naslov:</label><br>
                <input type="text" id="naslov" name="naslov" value="<?php echo $row['naslov']; ?>"><br>
                <label for="tekst">Tekst:</label><br>
                <textarea id="tekst" name="tekst"><?php echo $row['tekst']; ?></textarea><br>
                <label for="sazetak">Sažetak:</label><br>
                <textarea id="sazetak" name="sazetak"><?php echo $row['sazetak']; ?></textarea><br>
                <label for="kategorija">Kategorija:</label><br>
                <select id="kategorija" name="kategorija">
                    <option value="MMA" <?php if($row['kategorija'] == 'MMA') echo 'selected'; ?>>MMA</option>
                    <option value="Box" <?php if($row['kategorija'] == 'Box') echo 'selected'; ?>>Box</option>
                </select><br>
                <label for="slika">Trenutna slika:</label><br>
                <img src='uploads/<?php echo $row['slika']; ?>' width='100'><br>
                <label for="slika">Nova slika (ostavite prazno ako ne želite mijenjati):</label><br>
                <input type="file" id="slika" name="slika"><br>
                <label for="arhiva">Arhivirati:</label><br>
                <input type="checkbox" id="arhiva" name="arhiva" <?php if($row['arhiva']) echo 'checked'; ?>><br>
                <input type="submit" value="Spremi">
            </form>
        </section>
        <?php
        } else {
            echo "<section>";
            echo "Vijest nije pronađena.";
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
