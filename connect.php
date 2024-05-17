<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "", "myissat");

    // Vérifie la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $role = $_POST['role'];

    // Préparation des variables communes à tous les rôles
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $sexe = $_POST['sexe'];
    $branche = $_POST['branche'];
    // Vérification du rôle de l'utilisateur
    if ($role == "Enseignant") {
        $grade = $_POST['grade'];

        // Requête SQL pour insérer l'enseignant
        $sql_enseignant = "INSERT INTO enseignant (id, nom, email, mot_de_passe, sexe, grade,branche) 
                           VALUES ('$id', '$nom', '$email', '$mot_de_passe', '$sexe', '$grade','$branche')";

        // Exécution de la requête pour insérer dans la table enseignant
        if ($conn->query($sql_enseignant) === TRUE) {
            echo "Enseignant enregistré avec succès";
        } else {
            echo "Erreur lors de l'ajout de l'enseignant: " . $conn->error;
        }

        // Requête SQL pour insérer l'enseignant dans la table login
        $sql_login = "INSERT INTO login (id, email ,mot_de_passe, role) 
                      VALUES ('$id', $email ,'$mot_de_passe', 'Enseignant')";

        // Exécution de la requête pour insérer dans la table login
        if ($conn->query($sql_login) === TRUE) {
            echo "<script>alert('Inscription réussie !');</script>";
        } else {
            echo "Erreur lors de l'ajout de l'enseignant à la table login: " . $conn->error;
        }
    } elseif ($role == "Admin") {
        // Requête SQL pour insérer l'administrateur
        $sql_admin = "INSERT INTO admin (id, nom, email, mot_de_passe)  
                     VALUES ('$id', '$nom', '$email', '$mot_de_passe')";

        // Exécution de la requête pour insérer dans la table admin
        if ($conn->query($sql_admin) === TRUE) {
            echo "<script>alert('Enseignant ajouté à la table login avec succès!');</script>";
        } else {
            echo "Erreur lors de l'ajout de l'Admin: " . $conn->error;
        }

        // Requête SQL pour insérer l'admin dans la table login
        $sql_login = "INSERT INTO login (id , email , mot_de_passe, role) 
                     VALUES ('$id' ,'$email', '$mot_de_passe', 'Admin')";

        // Exécution de la requête pour insérer dans la table login
        if ($conn->query($sql_login) === TRUE) {
            echo "<script>alert('Admin ajouté à la table login avec succès!');</script>";
        } else {
            echo "Erreur lors de l'ajout de l'Admin à la table login: " . $conn->error;
        }
    } else {
        echo "<script>alert('Role Invalide!');</script>";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
}

?>