<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-08-28 14:11
 */
interface TagcontentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tagcontent 
	 */
	public function load($languageID, $tagnameID);

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
 	 * @param tagcontent primary key
 	 */
	public function delete($languageID, $tagnameID);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tagcontent tagcontent
 	 */
	public function insert($tagcontent);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tagcontent tagcontent
 	 */
	public function update($tagcontent);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByContent($value);


	public function deleteByContent($value);


}
?>