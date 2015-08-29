<?php
/**
 * Class that operate on table 'language'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 02:47
 */
class LanguageMySqlDAO implements LanguageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LanguageMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM language WHERE locale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM language';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM language ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param language primary key
 	 */
	public function delete($locale){
		$sql = 'DELETE FROM language WHERE locale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($locale);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LanguageMySql language
 	 */
	public function insert($language){
		$sql = 'INSERT INTO language (language) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($language->language);

		$id = $this->executeInsert($sqlQuery);	
		$language->locale = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LanguageMySql language
 	 */
	public function update($language){
		$sql = 'UPDATE language SET language = ? WHERE locale = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($language->language);

		$sqlQuery->set($language->locale);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM language';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByLanguage($value){
		$sql = 'SELECT * FROM language WHERE language = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByLanguage($value){
		$sql = 'DELETE FROM language WHERE language = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return LanguageMySql 
	 */
	protected function readRow($row){
		$language = new Language();
		
		$language->locale = $row['locale'];
		$language->language = $row['language'];

		return $language;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return LanguageMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>