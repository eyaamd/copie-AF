<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myissat";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération de l'ID du niveau sélectionné depuis la requête AJAX
$niveauId = $_GET['niveau'];

// Requête pour récupérer les semestres en fonction du niveau sélectionné
$query_semestres = "SELECT `id`, `nom` FROM `semestre`";
$result_semestres = $conn->query($query_semestres);

// Construction des options de la liste déroulante des semestres
$options = '<option value="">Sélectionnez un semestre</option>';
while ($row_semestre = $result_semestres->fetch_assoc()) {
    $options .= '<option value="' . $row_semestre['id'] . '">' . $row_semestre['nom'] . '</option>';
}

// Fermeture de la connexion
$conn->close();

// Renvoi des options des semestres
echo $options;
?>