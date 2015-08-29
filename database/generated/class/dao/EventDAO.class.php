<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 02:47
 */
interface EventDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Event 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param event primary key
 	 */
	public function delete($eventNumber);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Event event
 	 */
	public function insert($event);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Event event
 	 */
	public function update($event);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>