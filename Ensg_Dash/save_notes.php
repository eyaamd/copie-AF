<?php
// Vérifier si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "myissat");

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    foreach ($_POST as $key => $value) {
        // Vérifier que le champ de note est correctement formaté (note_id)
        if (strpos($key, 'note_') !== false) {
            // Extraire l'ID de l'étudiant à partir du nom du champ
            $etudiant_id = substr($key, 5);
            
            // Extraire l'ID de la matière à partir du nom du champ (il semble que ce soit différent)
            // Vous devriez vérifier le nom du champ pour extraire correctement l'ID de la matière
            // Dans cet exemple, je suppose que le nom du champ contient l'ID de la matière après "matiere_"
            $matiere_id = $_POST['$matiere_id'] ; // Je suppose que le nom du champ commence par "matiere_"
    
            // Échapper les valeurs pour éviter les injections SQL
            $note = $conn->real_escape_string($value);
    
            // Préparer la requête d'insertion des notes dans la table note
            $sql = "INSERT INTO `note` (`etudiant_id`, `note`, `matiere_id`) VALUES ('$etudiant_id', '$note', '$matiere_id')";
    
            // Exécuter la requête
            if ($conn->query($sql) !== TRUE) {
                echo "Erreur lors de l'enregistrement de la note pour l'étudiant avec l'ID: " . $etudiant_id;
                // Si vous avez besoin de journaliser l'erreur, vous pouvez le faire ici
            }
        }
    }
    // Fermer la connexion à la base de données
    $conn->close();

    // Réponse pour indiquer que l'enregistrement s'est bien passé (200 OK)
    http_response_code(200);
    echo "Les notes ont été enregistrées avec succès !";
} else {
    // Réponse pour indiquer une méthode non autorisée (405 Method Not Allowed)
    http_response_code(405);
    echo "Méthode non autorisée. Seules les requêtes POST sont acceptées.";
}
?>