<?php
require_once './loader.php';
require_once './config.php';
require_once './interfaces/IDBAdapter.php';
require_once './database/connection.php';
require_once './businessLogic/Users_bl.php';

class UsersBlTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $username;
    private $users_bl;

    protected function _before()
    {
        $_POST['username'] = 'JonAlexander@gmail.com';
        $_POST['password'] = 'snow';
        $this->users_bl = new Users_bl();

        $this->username =  $_POST['username'];
    }

    protected function _after()
    {
        Connection::getInstance()->delete('`User`', array("username" =>  $this->username));
    }

    // tests
    public function testUserCreation()
    {
        $isCreated = $this->users_bl->create();
        $this->tester->assertTrue($isCreated);
    }
    public function testUserAuthentication()
    {
        $_POST['username'] = 'juan@gmail.com';
        $_POST['password'] = 'juan';
        $isLogged = $this->users_bl->login();
        $this->tester->assertTrue($isLogged);
    }
}