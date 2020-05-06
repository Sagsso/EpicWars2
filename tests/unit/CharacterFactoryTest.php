<?php
// require_once './database/connection.php';
// require_once './loader.php';
// require_once './config.php';
require_once './interfaces/ICharacterFactory.php';
require_once './interfaces/ICharacter.php';
// require_once './interfaces/ICharacterBl.php';

require_once './factories/CharacterFactory.php';
require_once './businessLogic/characters_bl.php';
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
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testCreateMage()
    {
        $mage = CharacterFactory::createMage('Voldi');
        $this->tester->assertTrue($mage instanceof Mage);
    }
    public function testCreateRogue()
    {
        $rogue = CharacterFactory::createRogue('Ayoze');
        $this->tester->assertTrue($rogue instanceof Rogue);
    }
    public function testCreateWarrior()
    {
        $warrior = CharacterFactory::createWarrior('Spartacus');
        $this->tester->assertTrue($warrior instanceof Warrior);
    }

    public function testGetCharacter() {
        // \Codeception\Stub::make('Characters_bl', ['getClass' => function () {return 'Mage';}], $this);
        $cb = Codeception\Stub::make('Characters_bl', ['getCharacterName' => function () {return 'Lucius Malfoy';}]);
        $variable = $cb->getCharacterName(1);
        // // $character = CharacterFactory::getCharacter(7);
        // echo $variable;
        // $this->tester->assertEquals('Lucius Malfoy', $character->getName());
        // $this->tester->assertEquals('Lucius Malfoy', $variable);
        // $user = Stub::make('Characters_bl', ['getName' => 'john']);
        // // $name = $user->getName(); // 'john'
        // echo var_dump($user);
        // $this->tester->assertEquals('john', $user->getName());

        // $user = \Codeception\Stub::make('User', ['getName' => 'john']);
        // $name = $user->getName(); // 'john'
    }

}