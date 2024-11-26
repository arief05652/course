<?php
require './config/db.php';

if(isset($_POST['submit'])) {

    global $db_connect;

    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usedEmail = mysqli_query($db_connect,"SELECT email FROM users WHERE email = '$email'");
    if(mysqli_num_rows($usedEmail) > 0) {
        echo "email sudah digunakan";
        die;
    }

    $password = password_hash($password,PASSWORD_DEFAULT);
    $created_at = date('Y-m-d H:i:s',time());
        
    $users = mysqli_query($db_connect,"INSERT INTO users (name,email, password,created_at) VALUES
                            ('$name','$email','$password','$created_at')");

    header('Location: ../index.php');
    exit;
}