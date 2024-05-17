
<?php
session_start(); // Démarre la session

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=myissat;', 'root', '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['registerbtn'])) {
        $id = $_POST['id'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $role = $_POST['role'];

        // Requête SQL pour vérifier les informations de connexion
        $query = $bdd->prepare("SELECT * FROM login WHERE  mot_de_passe = :mot_de_passe AND role = :role AND id = :id");
        $query->execute(
            array(
                'mot_de_passe' => $mot_de_passe,
                'role' => $role,
                'id' => $id
            )
        );
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Si les informations de connexion sont correctes, définissez les variables de session et redirigez l'utilisateur
            $_SESSION['role'] = $result['role'];
            $_SESSION['id'] = $result['id'];

            // Redirection en fonction du rôle de l'utilisateur
            if ($role == 'Admin') {
                header('Location: Admin_dash/index.php');
                exit;
            } elseif ($role == 'Enseignant') {
                // Stocke l'identifiant de l'enseignant dans une variable de session
                $_SESSION['idEnseignant'] = $result['id']; // Supposons que 'id' soit l'identifiant de l'enseignant

                header('Location: Ensg_dash/indexE.php');
                exit;
            }
        } else {
            // Si les informations de connexion sont incorrectes, affichez un message d'erreur
            echo "<script>alert('Identifiants Incorrects !');</script>";
        }
    }
}
?>
