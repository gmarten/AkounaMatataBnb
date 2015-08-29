<?php
/**
 * Class that operate on table 'website'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 00:48
 */
class WebsiteMySqlExtDAO extends WebsiteMySqlDAO{

    /**
     * Get Domain object by name
     *
     * @param String $name primary key
     * @return WebsiteMySql
     */
    public function loadByName($name){
        $sql = 'SELECT * FROM website WHERE name = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($name);
        return $this->getRow($sqlQuery);
    }

    /*
     * Returns all foreign keys to this row (tags, contents and paragraphs)
     *
     * @param String page
     * @param String language
     * @Return Website website
     */
    public function loadTagsByIDAndLanguage($page, $language){
        $sql = 'select tn.name as tagname, tc.content as content
                from website w, tagname tn, tagcontent tc, language l
                WHERE w.id=tn.websiteID AND tn.id=tc.tagnameID AND tc.lang=l.locale
                AND l.locale = ?
                AND w.name = ?

                UNION
                select tn.name as tagname, p.content as content
                from website w, tagname tn, paragraph p, language l
                WHERE w.id=tn.websiteID AND tn.id=p.tagnameID AND p.lang=l.locale
                AND l.locale = ?
                AND w.name = ?';

        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($language);
        $sqlQuery->set($page);
        $sqlQuery->set($language);
        $sqlQuery->set($page);

        return $this->getTagsList($page, $sqlQuery);
    }

    private function getTagsList($name, $retQuery)
    {
        $website = new Website();
        $website->name = $name;

        // get tags
        $tab = QueryExecutor::execute($retQuery);
        $ret = array();
        for($i=0;$i<count($tab);$i++){
            $ret[$i] = $this->readTagsRow($tab[$i]);
        }
        $website->tags = $ret;
        return $website;
    }

    /**
     * Read row
     *
     * @param $row
     * @return WebsiteMySql
     */
    private function readTagsRow($row){
        $tagname = new Tagname();

        $tagname->name = $row['tagname'];
        $tagname->content = str_replace("\r\n",'', $row['content']);

        return $tagname;
    }
}
?>