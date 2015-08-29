<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 02:47
 */
interface TagnameDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tagname 
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
 	 * @param tagname primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tagname tagname
 	 */
	public function insert($tagname);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tagname tagname
 	 */
	public function update($tagname);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByWebsiteID($value);

	public function queryByEventID($value);


	public function deleteByName($value);

	public function deleteByWebsiteID($value);

	public function deleteByEventID($value);


}
?>