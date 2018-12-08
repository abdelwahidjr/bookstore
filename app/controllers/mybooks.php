<?php
if ( ! isset($_SESSION))
{
    session_start();
}

if (isset($_SESSION['user_email']))
{
    $email = $_SESSION['user_email'];

    include '../models/Book.php';

    $book = new Book();

    $mybooks = $book->get_user_books();

    $i = 0;
    while ($row = mysqli_fetch_array($mybooks))
    {
        $name = $row['name'];
        $url  = $row['url'];
        echo $i + 1 . ' - ' . "<a target='_blank' href='$url'>$name</a>" . "<br>";
        $i++;
    }


} else
{
    header('location:../../index.php');
}


    
    
