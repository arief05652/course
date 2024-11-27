<?php
session_start();

require './config/db.php';

if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = mysqli_query($db_connect,"SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($user) > 0) {
        $data = mysqli_fetch_assoc($user);
        $role = $data['role'];
        
        if(password_verify($password,$data['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            if ($role === 'user') {
                header('Location: ../user/dashboard.php');
                exit;
            } elseif ($role === 'admin') {
                header('Location: ../admin/dashboard.php');
                exit;
            }
        } else {
            echo "password salah";
            die;
        }
    } else {
        echo "email atau password salah";
        die;
    }
}