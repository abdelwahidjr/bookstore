<?php
if ( ! isset($_SESSION))
{
    session_start();
}

class Book
{
    private $cxn;

    function __construct()
    {
        // connect DB
        $this->connect_db();

    }


    private function connect_db()
    {
        include '../models/Database.php';
        $this->cxn = new Database();
    }

    public function add_book($book_name , $book_url)
    {
        $user_id = null;
        $email   = $_SESSION['user_email'];

        $query = "SELECT * FROM users WHERE email = '$email'";

        $query_result = mysqli_query($this->cxn->conn , $query);

        if (mysqli_num_rows($query_result) == 1)
        {
            $row     = mysqli_fetch_assoc($query_result);
            $user_id = $row['id'];
        }

        $query        = "SELECT * FROM books WHERE url = '$book_url'";
        $query_result = mysqli_query($this->cxn->conn , $query);

        if (mysqli_num_rows($query_result) == 1)
        {
            return false;
        }

        //insert in db

        $insert_query = "INSERT INTO books(name,url , user_id ) VALUES ('$book_name' ,'$book_url' , '$user_id');";

        mysqli_query($this->cxn->conn , $insert_query);

        return true;
    }

    public function get_user_books()
    {
        $user_id = null;
        $email   = $_SESSION['user_email'];

        $query = "SELECT * FROM users WHERE email = '$email'";

        $query_result = mysqli_query($this->cxn->conn , $query);

        if (mysqli_num_rows($query_result) == 1)
        {
            $row     = mysqli_fetch_assoc($query_result);
            $user_id = $row['id'];
        }

        $query = "SELECT * FROM books WHERE user_id = '$user_id'";

        $books = mysqli_query($this->cxn->conn , $query);

        return $books;
    }


}




