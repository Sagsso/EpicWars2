<?php

require_once './interfaces/ICharacter.php';
require_once './models/Character.php';
require_once './models/Warrior.php';
class WarriorTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $warrior;

    protected function _before()
    {
        $this->warrior  = new Warrior('Spartacus');
    }

    protected function _after()
    {
    }

    // tests
    public function testCreation()
    {
        $this->tester->assertEquals('Spartacus', $this->warrior->getName());
        $this->tester->assertEquals(1, $this->warrior->getLevel());
    }

    public function testLevelUp()
    {
        $newLevel = 5;
        $potenciator = array("str" => 2.3, 'intl' => 1.5, 'agi' => 1.6, 'mdef' => 1.6, 'fdef' => 1.1, 'hp' => 1.5);
        $oldStats = $this->warrior->getStats();

        $correctStats = array();
        foreach ($potenciator as $key => $value) {
            $correctStats[$key] = $oldStats[$key] * ($value * ($newLevel - 1));
        }

        //Set new level to warrior
        $this->warrior->setLevel($newLevel);
        $this->tester->assertEquals($newLevel, $this->warrior->getLevel());


        $newStats = $this->warrior->getStats();
        foreach ($correctStats as $key => $value) {
            $this->tester->assertEquals($value, $newStats[$key]);
        }
    }
}
