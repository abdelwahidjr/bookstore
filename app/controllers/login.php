<?php
if ( ! isset($_SESSION))
{
    session_start();
}

if (isset($_POST['submit']) && $_POST['submit'] == "login")
{
    $login_data['email']    = $_POST['email'];
    $login_data['password'] = $_POST['password'];

    include '../models/Login.php';
    $login = new Login($login_data);

    if ($login->user_login())
    {
        $_SESSION['user_email'] = $login_data['email'];

        header('location:../../index.php');

    } else
    {
        unset($_SESSION['user_email']);
        header('location:../../index.php');
    }

}
    
    
