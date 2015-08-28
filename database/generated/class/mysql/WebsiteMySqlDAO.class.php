<?php
/**
 * Class that operate on table 'website'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-08-28 14:11
 */
class WebsiteMySqlDAO implements WebsiteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return WebsiteMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM website WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM website';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM website ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param website primary key
 	 */
	public function delete($name){
		$sql = 'DELETE FROM website WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($name);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param WebsiteMySql website
 	 */
	public function insert($website){
		$sql = 'INSERT INTO website () VALUES ()';
		$sqlQuery = new SqlQuery($sql);
		

		$id = $this->executeInsert($sqlQuery);	
		$website->name = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param WebsiteMySql website
 	 */
	public function update($website){
		$sql = 'UPDATE website SET  WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		

		$sqlQuery->set($website->name);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM website';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return WebsiteMySql 
	 */
	protected function readRow($row){
		$website = new Website();
		
		$website->name = $row['name'];

		return $website;
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
	 * @return WebsiteMySql 
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

	public function loadTagsByIDAndLanguage($page, $language)
	{
		// TODO: Implement loadTagsByIDAndLanguage() method.
	}
}
?>