<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 02:47
 */
interface ParagraphDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Paragraph 
	 */
	public function load($tagnameID, $lang);

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
 	 * @param paragraph primary key
 	 */
	public function delete($tagnameID, $lang);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Paragraph paragraph
 	 */
	public function insert($paragraph);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Paragraph paragraph
 	 */
	public function update($paragraph);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByContent($value);


	public function deleteByContent($value);


}
?>