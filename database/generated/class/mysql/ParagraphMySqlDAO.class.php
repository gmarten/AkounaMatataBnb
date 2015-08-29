<?php
/**
 * Class that operate on table 'paragraph'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 02:47
 */
class ParagraphMySqlDAO implements ParagraphDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ParagraphMySql 
	 */
	public function load($tagnameID, $lang){
		$sql = 'SELECT * FROM paragraph WHERE tagnameID = ?  AND lang = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($tagnameID);
		$sqlQuery->set($lang);

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
	public function delete($tagnameID, $lang){
		$sql = 'DELETE FROM paragraph WHERE tagnameID = ?  AND lang = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($tagnameID);
		$sqlQuery->set($lang);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ParagraphMySql paragraph
 	 */
	public function insert($paragraph){
		$sql = 'INSERT INTO paragraph (content, tagnameID, lang) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($paragraph->content);

		
		$sqlQuery->setNumber($paragraph->tagnameID);

		$sqlQuery->set($paragraph->lang);

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
		$sql = 'UPDATE paragraph SET content = ? WHERE tagnameID = ?  AND lang = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($paragraph->content);

		
		$sqlQuery->setNumber($paragraph->tagnameID);

		$sqlQuery->set($paragraph->lang);

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
		
		$paragraph->tagnameID = $row['tagnameID'];
		$paragraph->lang = $row['lang'];
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