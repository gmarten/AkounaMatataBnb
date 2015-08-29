<?php
/**
 * Class that operate on table 'tagname'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 00:48
 */
class TagnameMySqlExtDAO extends TagnameMySqlDAO{

    /**
     * Get Domain object by name and by websiteID
     *
     * @param String $websiteID primary key
     * @param String $name primary key
     * @return TagnameMySql
     */
    public function loadByNameAndWebsite($websiteID, $tagname){
        $sql = 'SELECT * FROM tagname WHERE websiteID = ? AND name = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($websiteID);
        $sqlQuery->set($tagname);
        return $this->getRow($sqlQuery);
    }
}
?>