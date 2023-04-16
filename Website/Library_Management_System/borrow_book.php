<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $borrow_id = $_POST['borrow_id'];
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $borrow_date = $_POST['borrow_date'];
    $due_date = $_POST['due_date'];

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

    // Insert data into table
    $sql = "INSERT INTO BorrowedBooks (borrow_id, student_id, book_id, borrow_date, due_date)
    VALUES ('$borrow_id', '$student_id', '$book_id', '$borrow_date', '$due_date')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close MySQL connection
    mysqli_close($conn);
}
?>
