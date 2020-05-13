<?php 

require_once './loader.php';
require_once './config.php';
require_once './interfaces/IDBAdapter.php';
require_once './database/connection.php';

class CharacterBlTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        // $this->characters_bl = new Characters_bl();
        // Connection::getInstance()->insert('`Character`', ["name" => "Test", "level" => 4, "characterClassId" => 2]);
    }

    protected function _after()
    {
        // Connection::getInstance()->delete('`Character`', array("id" =>  200));
    }

    // tests
    public function testCreate()
    {
        // $class = $this->characters_bl->getClass($this->id);
        // $this->tester->assertEquals($class,'Mage');
    }

    public function testGetClass()
    {
        // $class = $this->characters_bl->getClass($this->id);
        // $this->tester->assertEquals($class,'Mage');
    }
}