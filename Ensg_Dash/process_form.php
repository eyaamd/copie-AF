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
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['note']) && isset($_POST['matiere']) && isset($_POST['student_id'])) {
    // Récupérer les données du formulaire
    $student_id = $_POST['student_id'];
    $matiere = $_POST['matiere'];
    $note = $_POST['note'];

    // Update note in the database
    $update_sql = "UPDATE note SET matiere = ?, note = ? WHERE student_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssi", $matiere, $note, $student_id);
    $stmt->execute();

    // Redirect back to the form page after updating
    header("Location: scanned_student_form.php?id=$student_id");
    exit();
}

// Check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    // Retrieve the id parameter from the URL
    $id = $_GET['id'];

    // Query to select data from the note table based on the student id
    $select_sql = "SELECT matiere, note FROM note WHERE student_id = ?";

    // Prepare and execute the statement
    $stmt = $conn->prepare($select_sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Store the result
    $result = $stmt->get_result();

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch data from each row
        $row = $result->fetch_assoc();
        $matiere = $row['matiere'];
        $note = $row['note'];
    } else {
        // If no rows are returned, set default values
        $matiere = "";
        $note = "";
    }
} else {
    // If id parameter is not set in the URL, redirect back to the form page
    header("Location: Etudiants.php");
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanned Student Form</title>
</head>

<body>
    <h1>Scanned Student Form</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="etudiant_id" value="<?php echo htmlspecialchars($id); ?>">
        <label for="matiere">Matiere:</label>
        <input type="text" id="matiere" name="matiere" value="<?php echo htmlspecialchars($matiere); ?>"><br>
        <label for="note">Note:</label>
        <input type="text" id="note" name="note" value="<?php echo htmlspecialchars($note); ?>"><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>