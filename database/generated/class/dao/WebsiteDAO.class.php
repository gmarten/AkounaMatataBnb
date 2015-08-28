<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-08-28 14:11
 */
interface WebsiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Website 
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
 	 * @param website primary key
 	 */
	public function delete($name);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Website website
 	 */
	public function insert($website);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Website website
 	 */
	public function update($website);	

	/**
	 * Delete all rows
	 */
	public function clean();

	/*
	 * Returns all foreign keys to this row (tags, contents and paragraphs)
	 *
	 * @param String page
	 * @param String language
	 * @Return Website website
	 */
	public function loadTagsByIDAndLanguage($page, $language);


}
?>