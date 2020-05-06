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
    
    protected function _before()
    {

    }

    protected function _after()
    {
    }

    // tests
    public function testCreateHistoryInDB()
    {
        //Stub for History class
        $history = \Codeception\Stub::make('History', 
        ['getChallengerId' => 2,
         'getDuelo' => 'Player 4 vs Player 6',
         'getResult' => 1,
         'getDetail' => 'Here is a super string with the battle.']);

        //MySQLiManager returns false if insert query is OK.
        $this->tester->assertFalse(History_bl::create($history));
    }

    public function testShow()
    {
        $_SESSION["user_id"] = 2;
 
        //History_bl::show() retorna arreglo si el usuario tiene historiales de combate.
        $this->tester->assertIsArray(History_bl::show());
        Connection::getInstance()->delete('`History`', array("userid" =>  $_SESSION["user_id"]));

    }

}