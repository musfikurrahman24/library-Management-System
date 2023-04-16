                            -- COMMANDS --

## Retrieve all books from the database:
SELECT * FROM book;


## Retrieve all books published after 1990:
SELECT * FROM book WHERE publication_year > 1990;


## Retrieve all books with the title "Analog Communication":
SELECT * FROM book WHERE book_name = 'Analog Communication';


## Add a new book to the database:
INSERT INTO books (book_id, author, publication_year, publisher,book_name,term,edition,category) 
VALUES (1000,'Md. Hasan',2010 ,'d','e' , '3rd', '5th','Math');


## Counting the number of students in the Student table
SELECT COUNT(*) FROM Student;


## Calculating the average fine in the Return_Books table
SELECT AVG(fine) FROM Return_Books;


## Finding the maximum publication year in the Book table
SELECT MAX(publication_year) FROM Book;


## Grouping the BorrowedBooks table by book_id and counting the number of borrowings for each book
SELECT book_id, COUNT(*) FROM BorrowedBooks GROUP BY book_id;


## Grouping the Report table by student_id and calculating the total fine for each student
SELECT student_id, SUM(fine) FROM Report GROUP BY student_id;


UPDATE book SET publication_year = 1999 WHERE book_name = 'Analog Communucation';


## Selecting data from the Student table where the year is greater than the average year of all students
SELECT * FROM Student WHERE year > (SELECT AVG(year) FROM Student);


## Selecting data from the Book table where the publisher matches a pattern in the Librarian table
SELECT * FROM Book WHERE publisher IN (SELECT DISTINCT librarian_email FROM Librarian WHERE librarian_email LIKE '%@library.com');


## Selecting data from the BorrowedBooks table where the book_id matches a condition in the Book table
SELECT * FROM BorrowedBooks WHERE book_id IN (SELECT book_id FROM Book WHERE publication_year > 2000);


## Selecting data from the Report table where the fine is greater than the average fine in the Return_Books table
SELECT * FROM Report WHERE fine > (SELECT AVG(fine) FROM Return_Books);


##Deleting a record from the BorrowedBooks table:
 DELETE FROM BorrowedBooks WHERE borrow_id = 100206;


##Joining the Student, BorrowedBooks, and Book tables to get the name of the student who borrowed a book with a specific book_id:
SELECT Student.student_name
FROM Student
INNER JOIN BorrowedBooks ON Student.student_id = BorrowedBooks.student_id
INNER JOIN Book ON BorrowedBooks.book_id = Book.book_id
WHERE Book.book_id = 3070;


#Using joins to combine data from multiple tables:

--

## Selecting data from the Book and Librarian tables and joining them on the librarian_id column
SELECT Book.book_name, Librarian.librarian_name
FROM Book
INNER JOIN Librarian ON Book.publication_year = Librarian.librarian_id;

-- Selecting data from the BorrowedBooks and Book tables and joining them on the book_id column
SELECT BorrowedBooks.borrow_id, Book.book_name
FROM BorrowedBooks
INNER JOIN Book ON BorrowedBooks.book_id = Book.book_id;

-- Selecting data from the Report and Student tables and joining them on the student_id column
SELECT Report.report_id, Student.student_name
FROM Report
INNER JOIN Student ON Report.student_id = Student.student_id;

-- Selecting data from the BorrowedBooks, Book, and Student tables and joining them on the book_id and student_id columns
SELECT BorrowedBooks.borrow_id, Book.book_name, Student.student_name
FROM BorrowedBooks
INNER JOIN Book ON BorrowedBooks.book_id = Book.book_id
INNER JOIN Student ON BorrowedBooks.student_id = Student.student_id;

#Calculating the total number of books borrowed by each student:
SELECT Student.student_id, Student.student_name, COUNT(*) AS total_borrowed_books
FROM Student
INNER JOIN BorrowedBooks ON Student.student_id = BorrowedBooks.student_id
GROUP BY Student.student_id, Student.student_name;

#Updating the publication year of a book with a specific book_id:
UPDATE Book SET publication_year = 2022 WHERE book_id = 4060;
