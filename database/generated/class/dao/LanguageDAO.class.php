<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 02:47
 */
interface LanguageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Language 
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
 	 * @param language primary key
 	 */
	public function delete($locale);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Language language
 	 */
	public function insert($language);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Language language
 	 */
	public function update($language);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLanguage($value);


	public function deleteByLanguage($value);


}
?>