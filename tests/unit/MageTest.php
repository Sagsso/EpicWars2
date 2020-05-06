<?php 

require_once './interfaces/ICharacter.php';
require_once './models/Character.php';
require_once './models/Mage.php';
class MageTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $mage;
    
    protected function _before()
    {
        $this->mage  = new Mage('Ricardo');
    }

    protected function _after()
    {

    }

    // tests
    public function testCreation()
    {
        $this->tester->assertEquals('Ricardo', $this->mage->getName());
    }

    public function testLevelUp()
    {
        $newLevel = 5;
        $potenciator = array("str" => 1.5, 'intl' => 2.3, 'agi' => 1.6, 'mdef' => 1.5, 'fdef' => 1.1, 'hp' => 1.4);
        $oldStats = $this->mage->getStats();

        $correctStats = array();
        foreach ($potenciator as $key => $value) {
            $correctStats[$key] = $oldStats[$key]*($value*($newLevel - 1));
        }

        //Set new level to mage
        $this->mage->setLevel($newLevel);
        $this->tester->assertEquals($newLevel, $this->mage->getLevel());


        $newStats = $this->mage->getStats();
        foreach ($correctStats as $key => $value) {
            $this->tester->assertEquals($value, $newStats[$key]);
        }

    }
}