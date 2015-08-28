<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-08-28 14:11
 */
interface EventImageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EventImage 
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
 	 * @param eventImage primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EventImage eventImage
 	 */
	public function insert($eventImage);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EventImage eventImage
 	 */
	public function update($eventImage);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByEventID($value);


	public function deleteByEventID($value);


}
?>