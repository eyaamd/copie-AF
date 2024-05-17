<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myissat";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['note']) && isset($_POST['matiere']) && isset($_POST['student_id'])) {
    // Récupérer les données du formulaire
    $student_id = $_POST['student_id'];
    $matiere = $_POST['matiere'];
    $note = $_POST['note'];

    // Récupérer l'identifiant de l'étudiant à partir de la table etudiant
    $get_student_id_query = "SELECT id FROM etudiant WHERE student_id = ?";
    $get_student_id_stmt = $conn->prepare($get_student_id_query);
    $get_student_id_stmt->bind_param("i", $student_id);
    $get_student_id_stmt->execute();
    $get_student_id_result = $get_student_id_stmt->get_result();

    if ($get_student_id_result->num_rows > 0) {
        // L'étudiant existe, obtenir son id
        $student_row = $get_student_id_result->fetch_assoc();
        $etudiant_id = $student_row['id'];

        // Insérer la note dans la table note
        $insert_sql = "INSERT INTO note (student_id, etudiant_id, matiere, note) VALUES (?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("iiis", $student_id, $etudiant_id, $matiere, $note);

        if ($insert_stmt->execute()) {
            // Succès de l'insertion
            echo "<script>alert('Note ajoutée avec succès!');</script>";
        } else {
            // Erreur lors de l'insertion
            echo "Erreur lors de l'insertion de la note: " . $insert_stmt->error;
        }
    } else {
        // L'étudiant n'existe pas
        echo "Erreur: L'étudiant avec l'identifiant spécifié n'existe pas.";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanned Student Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Formulaire d'ajout de notes d'étudiant</title>
    <!-- Styles CSS -->
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#f8f4f3]">
            <h2 class="font-bold text-3xl">Scanned Student <span
                    class="bg-[#fa8231] text-white px-2 rounded-md">Form</span>
            </h2>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mt-4">
                        <label for="student_id" class="block font-medium text-sm text-gray-700 mb-4">ID:</label>
                        <input type="text" id="student_id" name="student_id"
                            value="<?php echo htmlspecialchars($_GET['student_id'] ?? ''); ?>" readonly><br>
                    </div>
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700 mb-4" for="matiere">Matière:</label>
                        <select id="matiere" name="matiere"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525] ">
                            <option value="">Sélectionnez une matière</option>
                            <?php
                            // Charger les matières depuis un fichier ou une base de données
                            // Ici, j'utilise un fichier matiere.php, vous pouvez ajuster cette partie en fonction de votre cas d'utilisation
                            include 'matiere.php';
                            ?>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700 mb-4" for="note">Note:</label>
                        <input type="text" id="note" name="note" placeholder="Merci de saisir la note d'examen"
                            class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#f84525]"
                            value="<?php echo htmlspecialchars($_POST['note'] ?? ''); ?>"><br>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit"
                            class="inline-block rounded-full border-2 border-orange-500 text-orange-500 hover:border-orange-600 hover:bg-orange-400 hover:bg-opacity-10 hover:text-orange-600 focus:border-orange-700 focus:text-orange-700 active:border-orange-800 active:text-orange-800 dark:border-orange-300 dark:text-orange-300 dark:hover:hover:bg-orange-300 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">
                            Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>