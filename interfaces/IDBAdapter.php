<?php

/**
 * This interface is in charge of naming the 
 * functions that are specific to the adapters.
 */
interface IDBAdapter {

    /**
     * It is the one in charge of inserting data in the database table.
     * 
     * @param string $table The name of the existing table's columns in the database.
     * @param array $values It must contain the name of the table 
     * columns with the values to be inserted. In an array of objects.
     * @param string $where (optional) Condition.
     * @return bool
     */
    function insert($table, $values, $where);

    /**
     * It is in charge of selecting the information from the database.
     * 
     * @param string $attr The name of the existing table's columns in the database.
     * @param array $values It must contain the name of the table 
     * columns with the values to be inserted. In an array of objects.
     * @param string $where (optional) Condition.
     * @return array An array with all the rows and columns selected.
     */
    function select($attr, $values, $where);

    /**
     * It is the one in charge of updating data in the database table.
     * 
     * @param string $table The name of the existing table in the database.
     * @param array $values It must contain the name of the table 
     * columns with the values to be inserted. In an array of objects.
     * @param string $where (optional) Condition.
     * @return bool
     */
    function update($table, $values, $where);

    /**
     * It is the one in charge of deleting data in the database table.
     * 
     * @param string $table The name of the existing table in the database.
     * @param array $pk 
     * @param string $where (optional) Condition.
     * @return bool
     */
    function delete($table, $pk, $where);

    /**
     * It is in charge of verifying the existence of a record in the database.
     * 
     * @param string $attr The name of the existing table in the database.
     * @param array $table Database's table.
     * @param array $values It must contain the name of the table 
     * columns with the values to be inserted. In an array of objects.
     * @return bool
     */
    function check($attr,$table,$values);

    /**
     * It is in charge of obtaining all the data of a specific table.
     * 
     * @param string $table The name of the existing table in the database.
     * @return array An array with all the rows and columns.
     */
    function getAll($table);
}
