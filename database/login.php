<?php

require_once 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Validar usuario y contraseña
    $query = "SELECT COUNT(*) as contar from user WHERE username = '$username' AND password = '$password'";

    $result = Connection::getInstance()->query($query);
    // print_r($result);

    if($result['contar'] > 0) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: ' . URL.'home');
    } else {
        header('Location: ' . URL);
    }

}
