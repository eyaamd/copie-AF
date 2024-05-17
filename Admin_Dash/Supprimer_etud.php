<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "myissat");

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Vérifie si l'identifiant de l'étudiant à supprimer est présent dans l'URL
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    // Prépare la requête de suppression
    $sql = "DELETE FROM etudiant WHERE id=$id";
    // Exécute la requête
    $result = mysqli_query($conn, $sql);
    // Vérifie si la requête s'est bien déroulée
    if ($result) {
        // Redirige vers la page Etudiants.php après la suppression
        header("Location: Etudiants.php");
    } else {
        // Affiche une erreur en cas d'échec de la requête
        die(mysqli_error($conn));
    }
}

// Ferme la connexion à la base de données
$conn->close();
?>
