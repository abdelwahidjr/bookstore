<?php

if ( ! isset($_SESSION))
{
    session_start();
}

if (isset($_POST['submit']) && $_POST['submit'] == "register")
{
    $register_data['username'] = $_POST['username'];
    $register_data['email']    = $_POST['email'];
    $register_data['password'] = $_POST['password'];

    include '../models/Register.php';
    $register = new Register($register_data);

    if ($register->register_user())
    {
        $_SESSION['user_email'] = $register_data['email'];

        header('location:../../index.php');

    } else
    {
        unset($_SESSION['user_email']);
        header('location:../../index.php');

    }


}
    
    
