<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kucse_library";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert form data into MySQL database
$student_id = $_POST['student_id'];
$student_name = $_POST['student_name'];
$student_email = $_POST['student_email'];
$year = $_POST['year'];
$term = $_POST['term'];

$sql = "INSERT INTO student (student_id, student_name, student_email, year, term)
        VALUES ('$student_id', '$student_name', '$student_email', '$year', '$term')";

if (mysqli_query($conn, $sql)) {
    echo "New student record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
