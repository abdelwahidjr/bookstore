<?php

class Login
{
    private $email;
    private $password;

    private $cxn;       // database object

    function __construct($login_data)
    {
        // set data
        $this->set_data($login_data);

        // connect DB
        $this->connect_db();

    }

    private function set_data($login_data)
    {
        $this->email    = $login_data['email'];
        $this->password = $login_data['password'];
    }

    private function connect_db()
    {
        include '../models/Database.php';
        $this->cxn = new Database();
    }

    public function user_login()
    {
        $query = "SELECT * FROM users WHERE email = '$this->email'";

        $query_result = mysqli_query($this->cxn->conn , $query);

        if (mysqli_num_rows($query_result) == 1)
        {
            $row = mysqli_fetch_assoc($query_result);
            $row['password'];
            if (password_verify($this->password , $row['password']))
            {
                return true;
            }

        }

        return false;
    }


}


