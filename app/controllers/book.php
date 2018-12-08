<?php
if (isset($_POST['name']) && isset($_POST['url']) && $_POST['submit'] == "save_book")
{
    $book_name = $_POST['name'];
    $book_url  = $_POST['url'];

    include '../models/Book.php';

    $book = new Book();

    $book->add_book($book_name , $book_url);

    header('location:./mybooks.php');

}
    
    
