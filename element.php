<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Page de l'élément</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <header>
        <input type="text" id="search" placeholder="Recherche...">
        <div id="suggestions"></div>
    </header>
    <div id="element">
        <div id="info">
            <?php
            if (isset($_GET['name'])) {
                $name = $_GET['name'];

                $conn = mysqli_connect('localhost', 'root', '', 'autocompletion');
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM animaux WHERE nom = '$name'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo "<div>ID: " . $row['id'] . "</div>";
                    echo "<div>Nom: " . $row['nom'] . "</div>";
                    // Ajoutez d'autres informations à afficher si nécessaire
                } else {
                    echo "<div>Élément non trouvé.</div>";
                }

                mysqli_close($conn);
            }
            ?>

        </div>
    </div>
    <script src="1.js"></script>
    <script src="2.js"></script>
    <script src="js.js"></script>
</body>

</html>