<?php
// require_once './database/connection.php';
// require_once './businessLogic/history_bl.php';
require_once './loader.php';
require_once './config.php';
require_once './interfaces/IDBAdapter.php';
require_once './database/connection.php';
// require_once './businessLogic/history_bl.php';

class HistoryBlTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $userId;
    private $users_bl;
    private $history_bl;
    
    protected function _before()
    {
        $_POST['username'] = 'JonAlexander@gmail.com';
        $_POST['password'] = 'snow';
        $this->users_bl = new Users_bl();
        $this->history_bl = new History_bl();

    }

    protected function _after()
    {
    }

    // tests
    public function testCreateHistoryInDB()
    {

        $this->users_bl->create();
        $this->userId = $this->users_bl->getIdUser($_POST['username']);

        //Stub for History class
        $history = \Codeception\Stub::make('History', 
        ['getChallengerId' => $this->userId,
         'getDuelo' => 'Player 4 vs Player 6',
         'getResult' => 1,
         'getDetail' => 'Here is a super string with the battle.']);

        //MySQLiManager returns false if insert query is OK.
        $this->tester->assertFalse($this->history_bl->create($history));


    }

    public function testShow()
    {
        $this->userId = $this->users_bl->getIdUser($_POST['username']);
        $_SESSION["user_id"] = $this->userId;
        //$this->history_bl->show() retorna arreglo si el usuario tiene historiales de combate.
        $this->tester->assertIsArray($this->history_bl->show());
        Connection::getInstance()->delete('`History`', array("userid" =>  $this->userId));
        Connection::getInstance()->delete('`User`', array("id" =>  $this->userId));


    }

}