<?php
// Include QR code library
require 'phpqrcode/phpqrcode-master/qrlib.php';

// Function to generate QR code and return its binary data
function generateQRCode($data)
{
    ob_start(); // Start output buffering
    QRcode::png($data); // Generate QR code
    $imageData = ob_get_contents(); // Get the image data
    ob_end_clean(); // End buffering and clean output buffer
    return $imageData; // Return the image data
}

// Function to select and display QR codes of students from the database
function displayStudentQRCodes($conn, $niveauId, $groupenom)
{
    // Prepare the query
    $select_sql = "SELECT student_id, nom FROM etudiant WHERE id_niveau = ? AND groupe_nom = ?";
    $stmt = $conn->prepare($select_sql);

    // Bind parameters
    $stmt->bind_param("is", $niveauId, $groupenom);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Generate QR code data with student ID
            $form_url = "http://localhost/pfee-Copie(2)/public/Ensg_Dash/scanned_student_form.php";
            $qrCodeData = generateQRCode($form_url . "?student_id=" . $row['student_id']);

            // Display QR code for each student with link to redirect
            echo '<a href="' . $form_url . '?student_id=' . $row['student_id'] . '"><img student_id="qrCodeImage" src="data:image/png;base64,'.base64_encode($qrCodeData).'" alt="QR Code"></a><br>';
        }
    } else {
        echo "0 results";
    }

    // Close the statement
    $stmt->close();
}

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myissat";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get niveauId and groupenom from GET parameters
$niveauId = $_GET['niveau'] ?? null;
$groupenom = $_GET['groupe'] ?? null;

// Call the function to display QR codes of students
if ($niveauId !== null && $groupenom !== null) {
    displayStudentQRCodes($conn, $niveauId, $groupenom);
} else {
    echo "Missing parameters";
}

// Close the connection
$conn->close();
?>
