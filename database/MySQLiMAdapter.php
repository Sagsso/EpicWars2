<?php
require_once 'MySQLiManager.php';
class MySQLiMAdapter implements IDBAdapter {

    private $source;
    public function __construct($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) {
       $this->source = new MySQLiManager($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    }

    function insert($table, $values, $where = ''){
        return $this->source->insert($table, $values, $where);
    }
    function select($attr, $table, $where = ''){
        return $this->source->select($attr, $table, $where);
    }
    function update($table, $values, $where = ''){
        return $this->source->update($table, $values, $where);
    }
    function delete($table, $pk, $where = ''){
        return $this->source->delete($table, $pk, $where);
    }
    function check($attr, $table, $values){
        return $this->source->check($attr, $table, $values);
    }
    function getAll($table){
        return $this->source->select('*', $table);
    }
    function getAllCharacters(){
        return $this->source->select('*','user_character', "username = '".$_SESSION["username"]."'");
    }
    function query($query){
        $consulta = mysqli_query($this->source->getLink(), $query);
        return mysqli_fetch_array($consulta);
    }
}