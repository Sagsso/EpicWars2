<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author pabhoz
 */
interface ICharacterFactory {
    static function createMage(string $name): Mage;
    static function createRogue(string $name): Rogue;
    static function createWarrior(string $name): Warrior;
}
