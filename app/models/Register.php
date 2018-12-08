<?php
if ( ! isset($_SESSION))
{
    session_start();
}

class Register
{
    private $username;
    private $email;
    private $password;

    private $cxn;       // database object


    function __construct($register_data)
    {
        // set data
        $this->set_data($register_data);

        // connect DB
        $this->connect_db();

    }


    private function set_data($register_data)
    {
        $this->username = $register_data['username'];
        $this->email    = $register_data['email'];

        $hashed_password = password_hash($register_data['password'] , PASSWORD_DEFAULT);

        $this->password = $hashed_password;
    }


    private function connect_db()
    {
        include '../models/Database.php';
        $this->cxn = new Database();
    }


    public function register_user()
    {
        $validation_query = "SELECT * FROM users WHERE email = '$this->email'";

        $validation_query_result = mysqli_query($this->cxn->conn , $validation_query);

        $num_rows = mysqli_num_rows($validation_query_result);

        if ($num_rows)
        {
            return false;

        } else
        {
            //insert in db

            $insert_query = "INSERT INTO users (username , email , password ) VALUES ('$this->username' , '$this->email' , '$this->password');";

            mysqli_query($this->cxn->conn , $insert_query);

            return true;
        }
    }
}


