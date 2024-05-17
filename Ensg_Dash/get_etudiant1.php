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
$matiereId = $_GET['matiere'];

// Requête pour récupérer les étudiants associés au niveau, groupe, semestre et matière sélectionnés
$query_etudiants = "SELECT n.etudiant_id AS student_id, n.note, n.matiere
FROM note n
INNER JOIN etudiant e ON n.etudiant_id = e.id
WHERE e.id_niveau = $niveauId
AND n.matiere = $matiereId
";

$result_etudiants = $conn->query($query_etudiants);
// Construction de la liste des étudiants avec des champs de saisie de note
echo "<div class='w-full overflow-hidden rounded-lg shadow-xs'>";
echo "<div class='w-full overflow-x-auto'>";
echo "<table class='w-full whitespace-no-wrap'>";
echo "<thead>";
echo "<tr class='text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800'>";
echo "<th class='px-4 py-3'>Id</th><th class='px-4 py-3'>Note</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($row_etudiant = $result_etudiants->fetch_assoc()) {
    echo "<tr class='text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800'>";
    echo "<td class='px-4 py-3'>" . $row_etudiant['student_id'] . "</td>";
    echo "<td class='px-4 py-3'>" . $row_etudiant['note'] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";


echo "</div>";
echo "</div>";

// Fermeture de la connexion
$conn->close();
?>