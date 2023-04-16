<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kucse_library";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$librarian_id = $_POST['librarian_id'];
$librarian_name = $_POST['librarian_name'];
$librarian_email = $_POST['librarian_email'];

// Insert data into table
$sql = "INSERT INTO librarian (librarian_id, librarian_name, librarian_email) VALUES ('$librarian_id', '$librarian_name', '$librarian_email')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
