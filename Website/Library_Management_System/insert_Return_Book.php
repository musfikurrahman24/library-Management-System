<?php

// Connect to database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'kucse_library';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Get form data
$return_id = $_POST['return_id'];
$borrow_id = $_POST['borrow_id'];
$return_date = $_POST['return_date'];
$fine = $_POST['fine'];

// Insert form data into database
$sql = "INSERT INTO return_books (return_id, borrow_id, return_date, fine) VALUES ('$return_id', '$borrow_id', '$return_date', '$fine')";

if (mysqli_query($conn, $sql)) {
    echo "Return record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
