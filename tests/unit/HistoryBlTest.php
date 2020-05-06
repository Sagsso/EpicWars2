<?php
// require_once './database/connection.php';
// require_once './businessLogic/history_bl.php';
require_once './loader.php';
require_once './config.php';
require_once './interfaces/IDBAdapter.php';
require_once './database/connection.php';
require_once './businessLogic/history_bl.php';

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

        $this->tester->assertFalse(History_bl::create($history));
    }

}