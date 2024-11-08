<?php
session_start();

if (isset($_POST['email']) || isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['email'] = $email;

    if ($email == 'admin@gmail.com' && $password == 'anjay') {
        header('Location: home.php');
    }
}
