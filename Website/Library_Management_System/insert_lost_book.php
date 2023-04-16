<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kucse_library";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lost_id = $_POST["lost_id"];
    $borrow_id = $_POST["borrow_id"];
    $lost_date = $_POST["lost_date"];
    $fine = $_POST["fine"];

    // Insert data into database
    $sql = "INSERT INTO lost_books (lost_id, borrow_id, lost_date, fine) VALUES ('$lost_id', '$borrow_id', '$lost_date', '$fine')";

    if (mysqli_query($conn, $sql)) {
        echo "Lost book report submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
