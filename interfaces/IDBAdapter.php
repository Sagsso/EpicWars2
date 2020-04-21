<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author sagsso
 */
interface IDBAdapter {
    function insert($table, $values, $where);
    function select($attr, $values, $where);
    function update($table, $values, $where);
    function delete($table, $pk, $where);
    function check($attr,$table,$values);
    function getAll($table);
}
