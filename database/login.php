<?php

require_once 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Validar usuario y contraseña
    $query = "SELECT COUNT(*) as contar from User WHERE username = '$username' AND password = '$password'";
    $id = Connection::getInstance()->select('id', 'User', "username = '$username'")[0]["id"];
    $result = Connection::getInstance()->query($query)[0];

    if($result['contar'] > 0) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $id;
        header('Location: ' . URL.'home');
    } else {
        header('Location: ' . URL);
    }

}
