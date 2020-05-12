<?php
// require_once './database/connection.php';
// require_once './loader.php';
// require_once './config.php';
require_once './interfaces/ICharacterFactory.php';
require_once './interfaces/ICharacter.php';
// require_once './interfaces/ICharacterBl.php';

require_once './factories/CharacterFactory.php';
require_once './businessLogic/Characters_bl.php';
require_once './models/Character.php';
require_once './models/Mage.php';
require_once './models/Warrior.php';
require_once './models/Rogue.php';

class CharacterFactoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $characterFactory;
    
    protected function _before()
    {
        $this->characterFactory = new CharacterFactory();
    }

    protected function _after()
    {
    }

    // tests
    public function testCreateMage()
    {
        $mage = $this->characterFactory->createMage('Voldi');
        $this->tester->assertTrue($mage instanceof Mage);
    }
    public function testCreateRogue()
    {
        $rogue = $this->characterFactory->createRogue('Ayoze');
        $this->tester->assertTrue($rogue instanceof Rogue);
    }
    public function testCreateWarrior()
    {
        $warrior = $this->characterFactory->createWarrior('Spartacus');
        $this->tester->assertTrue($warrior instanceof Warrior);
    }

    // public function testGetCharacter() {

    //     $cb = \Codeception\Stub::make('Characters_bl', 
    //         ['getCharacterName' => function ($id) {return 'Lucius Malfoy';}]);
    //     $name = $cb->getCharacterName(1);
    
    // }

}