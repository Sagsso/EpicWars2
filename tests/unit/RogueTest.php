<?php

require_once './interfaces/ICharacter.php';
require_once './models/Character.php';
require_once './models/Rogue.php';
class RogueTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $rogue;

    protected function _before()
    {
        $this->rogue  = new Rogue('Ayoze');
    }

    protected function _after()
    {
    }

    // tests
    public function testCreation()
    {
        $this->tester->assertEquals('Ayoze', $this->rogue->getName());
        $this->tester->assertEquals(1, $this->rogue->getLevel());
    }

    public function testLevelUp()
    {
        $newLevel = 5;
        $potenciator = array("str" => 1.6, 'intl' => 1.5, 'agi' => 1.9, 'mdef' => 1.6, 'fdef' => 1.6, 'hp' => 1.3);
        $oldStats = $this->rogue->getStats();

        $correctStats = array();
        foreach ($potenciator as $key => $value) {
            $correctStats[$key] = $oldStats[$key] * ($value * ($newLevel - 1));
        }

        //Set new level to rogue
        $this->rogue->setLevel($newLevel);
        $this->tester->assertEquals($newLevel, $this->rogue->getLevel());


        $newStats = $this->rogue->getStats();
        foreach ($correctStats as $key => $value) {
            $this->tester->assertEquals($value, $newStats[$key]);
        }
    }
}
