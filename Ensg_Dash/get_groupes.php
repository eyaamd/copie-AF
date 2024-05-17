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

// Requête pour récupérer les groupes associés au niveau sélectionné
$query_groupes = "SELECT `id`, `nom` FROM `groupe` WHERE `id_niveau` = $niveauId";
$result_groupes = $conn->query($query_groupes);

// Construction de la liste des groupes
$liste_groupes = '<option value="">Sélectionnez un groupe</option>';
while ($row_groupe = $result_groupes->fetch_assoc()) {
    $liste_groupes .= '<option value="' . $row_groupe['nom'] . '">' . $row_groupe['nom'] . '</option>';
}

// Fermeture de la connexion
$conn->close();

// Renvoi de la liste des groupes
echo $liste_groupes;
?>