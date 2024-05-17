<?php
// Include QR code library
/*require 'phpqrcode\phpqrcode-master\qrlib.php';

// Function to generate QR code and return its binary data
function generateQRCode($data)
{
    ob_start(); // Start output buffering
    QRcode::png($data); // Generate QR code
    $imageData = ob_get_contents(); // Get the image data
    ob_end_clean(); // End buffering and clean output buffer
    return $imageData; // Return the image data
}
// Function to insert a new student into the database and generate/store QR code
function insertStudent($conn, $student_name, $id, $nom, $email, $sexe)
{
    // Generate a unique QR code data for the student
    // $student_data = "Student ID: $id\nStudent Name: $student_name\nName: $nom\nE-mail: $email\sexe: $sexe";
    // $qrCodeData = generateQRCode($student_data);

// URL to the form PHP file
    $form_url = "http://localhost/pfee/public/Admin_Dash/scanned_student_form.php";
// Include student data in the URL parameters
    $qrCodeData = generateQRCode($form_url . "?id=$id");


 // Insert new student into the database
    $insert_sql = "INSERT INTO etudiant (id, nom, email, sexe, id_niveau, groupe_nom, qr_code) VALUES (?, ?, ?, ?, 1, 'groupe 1', ?)";

    // Prepare and execute the statement
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("issss", $id, $nom, $email, $sexe, $qrCodeData);
    if (!$stmt->execute()) {
        die("Error inserting student: " . $stmt->error);
    }

 // echo "Student added successfully with ID: $id";
    header("Location: Etudiants.php");
}

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Retrieve student data from the form
    $student_name = $_POST['student_name'];
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $sexe = $_POST['sexe'];

// Call the function to insert the student
    insertStudent($conn, $student_name, $id, $nom, $email, $sexe);
}
// Close database connection
$conn->close();*/
// Include QR code library
require 'phpqrcode\phpqrcode-master\qrlib.php';
function generateQRCode($data)
{

    // Generate QR code
    ob_start(); // Start output buffering
    QRcode::png($data); // Generate QR code
    $imageData = ob_get_contents(); // Get the image data
    ob_end_clean(); // End buffering and clean output buffer
    return $imageData; // Return the image data
}

// Function to insert a new student into the database and generate/store QR code
function insertStudent($conn, $id, $nom, $email, $sexe)
{
    // Generate a unique QR code data for the student
    $student_data = "Student ID: $id\nName: $nom\nE-mail: $email\nSexe: $sexe";

    // Generate and save the QR code image
    $qrCodeImagePath = generateQRCode($student_data);

    // Insert new student into the database
    $insert_sql = "INSERT INTO etudiant (id, nom, email, sexe, groupe_nom, qr_code) VALUES (?, ?, ?, ?, 'groupe 1', ?)";

    // Prepare and execute the statement
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("issss", $id, $nom, $email, $sexe, $qrCodeImagePath);
    if (!$stmt->execute()) {
        die("Error inserting student: " . $stmt->error);
    }

    // Redirect to a page after insertion
    header("Location: Etudiants.php");
}

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve student data from the form
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $sexe = $_POST['sexe'];

    // Call the function to insert the student
    insertStudent($conn,$id, $nom, $email, $sexe);
}

// Close database connection
$conn->close();
?>