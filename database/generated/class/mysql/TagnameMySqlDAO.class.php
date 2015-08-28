<?php
/**
 * Class that operate on table 'tagname'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 00:48
 */
class TagnameMySqlDAO implements TagnameDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TagnameMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tagname WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tagname';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tagname ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tagname primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tagname WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TagnameMySql tagname
 	 */
	public function insert($tagname){
		$sql = 'INSERT INTO tagname (name, websiteID, eventID) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tagname->name);
		$sqlQuery->setNumber($tagname->websiteID);
		$sqlQuery->setNumber($tagname->eventID);

		$id = $this->executeInsert($sqlQuery);	
		$tagname->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TagnameMySql tagname
 	 */
	public function update($tagname){
		$sql = 'UPDATE tagname SET name = ?, websiteID = ?, eventID = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tagname->name);
		$sqlQuery->setNumber($tagname->websiteID);
		$sqlQuery->setNumber($tagname->eventID);

		$sqlQuery->setNumber($tagname->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tagname';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM tagname WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWebsiteID($value){
		$sql = 'SELECT * FROM tagname WHERE websiteID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEventID($value){
		$sql = 'SELECT * FROM tagname WHERE eventID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM tagname WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWebsiteID($value){
		$sql = 'DELETE FROM tagname WHERE websiteID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEventID($value){
		$sql = 'DELETE FROM tagname WHERE eventID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TagnameMySql 
	 */
	protected function readRow($row){
		$tagname = new Tagname();
		
		$tagname->id = $row['id'];
		$tagname->name = $row['name'];
		$tagname->websiteID = $row['websiteID'];
		$tagname->eventID = $row['eventID'];

		return $tagname;
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
	 * @return TagnameMySql 
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