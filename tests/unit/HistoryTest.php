<?php
require_once './loader.php';
require_once './config.php';
class HistoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $history;
    protected function _before()
    {
        $this->history = new History();
    }

    protected function _after()
    {
    }

    // tests
    public function testLocutor()
    {
        $character1 = \Codeception\Stub::make(
            'Mage',
            [
                'getName' => 'myMage',
                'getMDef' => 36,
                'getFDef' => 15,
                'getHp' => 54
            ]
        );
        $character2 = \Codeception\Stub::make(
            'Rogue',
            [
                'getName' => 'myRogue',
                'getMDef' => 10,
                'getFDef' => 26,
                'getHp' => 59
            ]
        );

        $details = array('takenDamage' => 14, 'critical' => false, 'magical' => true, 'damage' =>15);
        $strLocutor = $this->history->locutor($character1, $character2,$details);
        $this->tester->assertIsString($strLocutor);
        $this->tester->assertEquals($strLocutor, $this->history->getDetail());

    }

    public function testDeath() {
        $character1 = \Codeception\Stub::make(
            'Warrior',
            [
                'getName' => 'myWarrior'
            ]
        );

        $strDeath = $this->history->death($character1);
        $this->tester->assertEquals($strDeath, $this->history->getDetail());
    }
}