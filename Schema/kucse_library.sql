CREATE TABLE Student (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(50),
    student_email VARCHAR(50),
   year INT,
   term INT
    
);

CREATE TABLE Librarian (
    librarian_id INT PRIMARY KEY,
    librarian_name VARCHAR(50),
    librarian_email VARCHAR(50)
    
    
);

CREATE TABLE Book (
    book_id INT PRIMARY KEY,
    author VARCHAR(50),
    publication_year INT,
    publisher VARCHAR(50),
    book_name VARCHAR(100),
    term VARCHAR(50),
    edition VARCHAR(50),
    category VARCHAR(50)
);

CREATE TABLE BorrowedBooks (
    borrow_id INT PRIMARY KEY,
    student_id INT,
    book_id INT,
    borrow_date DATE,
    due_date DATE,
    FOREIGN KEY (student_id) REFERENCES Student(student_id),
    FOREIGN KEY (book_id) REFERENCES Book(book_id)
);

CREATE TABLE Return_Books (
    return_id INT PRIMARY KEY,
    borrow_id INT,
    return_date DATE,
    fine INT,
    FOREIGN KEY (borrow_id) REFERENCES BorrowedBooks(borrow_id)
);

CREATE TABLE Lost_Books (
    lost_id INT PRIMARY KEY,
    borrow_id INT,
    lost_date DATE,
    fine INT,
    FOREIGN KEY (borrow_id) REFERENCES BorrowedBooks(borrow_id)
);

CREATE TABLE Report (
    report_id INT PRIMARY KEY,
    student_id INT,
    librarian_id INT,
    book_id INT,
    borrow_date DATE,
    due_date DATE,
    return_date DATE,
    fine INT,
    FOREIGN KEY (student_id) REFERENCES Student(student_id),
    FOREIGN KEY (librarian_id) REFERENCES Librarian(librarian_id),
    FOREIGN KEY (book_id) REFERENCES Book(book_id)
);
 