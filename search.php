<?php
if(isset($_POST['query'])) {
    $search = $_POST['query'];
    
    $conn = mysqli_connect('localhost', 'root', '', 'autocompletion');
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $query = "SELECT * FROM animaux WHERE nom LIKE '$search%' OR nom LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div>".$row['nom']."</div>";
        }
    } else {
        echo "<div>Aucun résultat trouvé.</div>";
    }
    
    mysqli_close($conn);
}