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
    
    protected function _before()
    {
        $_POST['username'] = 'JonAlexander@gmail.com';
        $_POST['password'] = 'snow';

    }

    protected function _after()
    {
    }

    // tests
    public function testCreateHistoryInDB()
    {


        Users_bl::create();
        $this->userId = Users_bl::getIdUser($_POST['username']);

        //Stub for History class
        $history = \Codeception\Stub::make('History', 
        ['getChallengerId' => $this->userId,
         'getDuelo' => 'Player 4 vs Player 6',
         'getResult' => 1,
         'getDetail' => 'Here is a super string with the battle.']);

        //MySQLiManager returns false if insert query is OK.
        $this->tester->assertFalse(History_bl::create($history));


    }

    public function testShow()
    {
        $this->userId = Users_bl::getIdUser($_POST['username']);
        $_SESSION["user_id"] = $this->userId;
        //History_bl::show() retorna arreglo si el usuario tiene historiales de combate.
        $this->tester->assertIsArray(History_bl::show());
        Connection::getInstance()->delete('`History`', array("userid" =>  $this->userId));
        Connection::getInstance()->delete('`User`', array("id" =>  $this->userId));


    }

}