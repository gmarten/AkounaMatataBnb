<?php
/**
 * Class that operate on table 'tagcontent'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 00:48
 */
class TagcontentMySqlDAO implements TagcontentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TagcontentMySql 
	 */
	public function load($languageID, $tagnameID){
		$sql = 'SELECT * FROM tagcontent WHERE languageID = ?  AND tagnameID = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($languageID);
		$sqlQuery->setNumber($tagnameID);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tagcontent';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tagcontent ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tagcontent primary key
 	 */
	public function delete($languageID, $tagnameID){
		$sql = 'DELETE FROM tagcontent WHERE languageID = ?  AND tagnameID = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($languageID);
		$sqlQuery->setNumber($tagnameID);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TagcontentMySql tagcontent
 	 */
	public function insert($tagcontent){
		$sql = 'INSERT INTO tagcontent (content, languageID, tagnameID) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tagcontent->content);

		
		$sqlQuery->setNumber($tagcontent->languageID);

		$sqlQuery->setNumber($tagcontent->tagnameID);

		$this->executeInsert($sqlQuery);	
		//$tagcontent->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TagcontentMySql tagcontent
 	 */
	public function update($tagcontent){
		$sql = 'UPDATE tagcontent SET content = ? WHERE languageID = ?  AND tagnameID = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tagcontent->content);

		
		$sqlQuery->setNumber($tagcontent->languageID);

		$sqlQuery->setNumber($tagcontent->tagnameID);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tagcontent';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByContent($value){
		$sql = 'SELECT * FROM tagcontent WHERE content = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByContent($value){
		$sql = 'DELETE FROM tagcontent WHERE content = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TagcontentMySql 
	 */
	protected function readRow($row){
		$tagcontent = new Tagcontent();
		
		$tagcontent->languageID = $row['languageID'];
		$tagcontent->tagnameID = $row['tagnameID'];
		$tagcontent->content = $row['content'];

		return $tagcontent;
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
	 * @return TagcontentMySql 
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