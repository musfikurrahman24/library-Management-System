<?php

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Retrieve form data
    $book_id = $_POST['book_id'];
    $author = $_POST['author'];
    $publication_year = $_POST['publication_year'];
    $publisher = $_POST['publisher'];
    $book_name = $_POST['book_name'];
    $term = $_POST['term'];
    $edition = $_POST['edition'];
    $category = $_POST['category'];
    
    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kucse_library";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    
    // Insert form data into database
    $sql = "INSERT INTO Book (book_id, author, publication_year, publisher, book_name, term, edition, category)
     VALUES ('$book_id', '$author', '$publication_year', '$publisher', '$book_name', '$term', '$edition', '$category')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}

?>
