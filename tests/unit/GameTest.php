<?php

require_once './loader.php';
require_once './config.php';
require_once './factories/CharacterFactory.php';

class GameTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $charactersFactory = new CharacterFactory();
        $character1 = $charactersFactory->createMage("Challenger");
        $character2 = $charactersFactory->createRogue("Challenged");
        $game = new Game($character1,$character2);
    }

    protected function _after()
    {
    }

    // tests
    public function testFight()
    {

    }

    public function testWon()
    {
        
    }
}