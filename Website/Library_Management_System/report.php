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

// Insert form data into database
$sql = "INSERT INTO report (report_id, student_id, librarian_id, book_id, borrow_date, due_date, return_date, fine) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssssss", $report_id, $student_id, $librarian_id, $book_id, $borrow_date, $due_date, $return_date, $fine);

$report_id = $_POST["report_id"];
$student_id = $_POST["student_id"];
$librarian_id = $_POST["librarian_id"];
$book_id = $_POST["book_id"];
$borrow_date = $_POST["borrow_date"];
$due_date = $_POST["due_date"];
$return_date = $_POST["return_date"];
$fine = $_POST["fine"];

if (mysqli_stmt_execute($stmt)) {
    echo "Report submitted successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
