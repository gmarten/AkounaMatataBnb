<?php
/**
 * Class that operate on table 'paragraph'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 00:48
 */
class ParagraphMySqlDAO implements ParagraphDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ParagraphMySql 
	 */
	public function load($languageID, $tagnameID){
		$sql = 'SELECT * FROM paragraph WHERE languageID = ?  AND tagnameID = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($languageID);
		$sqlQuery->setNumber($tagnameID);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM paragraph';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM paragraph ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param paragraph primary key
 	 */
	public function delete($languageID, $tagnameID){
		$sql = 'DELETE FROM paragraph WHERE languageID = ?  AND tagnameID = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($languageID);
		$sqlQuery->setNumber($tagnameID);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ParagraphMySql paragraph
 	 */
	public function insert($paragraph){
		$sql = 'INSERT INTO paragraph (content, languageID, tagnameID) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($paragraph->content);

		
		$sqlQuery->setNumber($paragraph->languageID);

		$sqlQuery->setNumber($paragraph->tagnameID);

		$this->executeInsert($sqlQuery);	
		//$paragraph->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ParagraphMySql paragraph
 	 */
	public function update($paragraph){
		$sql = 'UPDATE paragraph SET content = ? WHERE languageID = ?  AND tagnameID = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($paragraph->content);

		
		$sqlQuery->setNumber($paragraph->languageID);

		$sqlQuery->setNumber($paragraph->tagnameID);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM paragraph';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByContent($value){
		$sql = 'SELECT * FROM paragraph WHERE content = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByContent($value){
		$sql = 'DELETE FROM paragraph WHERE content = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ParagraphMySql 
	 */
	protected function readRow($row){
		$paragraph = new Paragraph();
		
		$paragraph->languageID = $row['languageID'];
		$paragraph->tagnameID = $row['tagnameID'];
		$paragraph->content = $row['content'];

		return $paragraph;
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
	 * @return ParagraphMySql 
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