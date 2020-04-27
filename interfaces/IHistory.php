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
interface IHistory {
    
    function locutor(ICharacter $character1, ICharacter $character2, array $details) :string;
    
    function death(ICharacter $stats) :string;
}