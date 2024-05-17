<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "myissat");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les types d'examen depuis la base de données
$sql = "SELECT `id`, `nom` FROM `type_exam`";
$result = $conn->query($sql);

// Construire les options du menu déroulant
$options = '<option value="">Sélectionnez un type d\'examen</option>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
    }
}

// Fermer la connexion à la base de données
$conn->close();

// Retourner les options du menu déroulant
echo $options;
?>
