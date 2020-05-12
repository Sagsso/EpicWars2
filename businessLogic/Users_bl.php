<?php
// define('DATABASE', __DIR__ . '/database/');

require_once "./database/connection.php";

/**
 * Description of Users_bl.
 * 
 * It is in charge of creating, bringing, updating, or deleting 
 * specific data, according to the function, 
 * from the table user in the database. 
 */
class Users_bl{

    /**
     * login method.
     * 
     * This function is responsible for verifying the sign in 
     * data obtained by the POST method, comparing it with the data 
     * obtained from the user database.
     * 
     * @return void
     */
    public static function login() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            //Validar usuario y contraseña
            $query = "SELECT COUNT(*) as contar from User WHERE username = '$username' AND password = '$password'";
            $id = Connection::getInstance()->select('id', 'User', "username = '$username'")[0]["id"];
            $result = Connection::getInstance()->query($query)[0];

            if ($result['contar'] > 0) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $id;
                header('Location: ' . URL . 'home');
                return true;
            } else {
                header('Location: ' . URL);
                return false;
            }
        }
    }

    /**
     * create method.
     * 
     * This function is responsible for creating a new user in the 
     * database with the registration data obtained by POST method.
     * 
     * @return void
     */
    public static function create() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            Connection::getInstance()->insert('User', ["username" =>  $username, "password" => $password]);

            header('Location: ' . URL);
            return true;
        }
        return false;
    }

    public static function getIdUser($username)
    {
        $result = Connection::getInstance()->select('id', '`User`', "username = '" . $username . "'");
        return $result[0]["id"];
    }
}
?>