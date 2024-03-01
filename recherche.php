<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <header>
        <div class="test">
            <input type="text" id="search" placeholder="Recherche...">
        </div>
        <div class="test">
            <div id="suggestions"></div>
        </div>
    </header>
    <main>
        <h1>RESULTAT</h1>
        <div id="results">
            <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];

                $conn = mysqli_connect('localhost', 'root', '', 'autocompletion');
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM animaux WHERE nom LIKE '%$search%'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div id='try'>" . $row['nom'] . "</div>";
                    }
                } else {
                    echo "<div>Aucun résultat trouvé.</div>";
                }

                mysqli_close($conn);
            }
            ?>
        </div>
    </main>
    <script src="1.js"></script>
    <script src="2.js"></script>
    <script src="js.js"></script>
</body>

</html>