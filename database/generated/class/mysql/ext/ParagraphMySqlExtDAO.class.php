<?php
/**
 * Class that operate on table 'paragraph'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-08-29 00:48
 */
class ParagraphMySqlExtDAO extends ParagraphMySqlDAO{

    /*
     * Updates a paragraph given a tagname, language and website
     *
     * @param String page
     * @param Paragraph $paragraph
     * @Return String output
     */
    public function updateByWebsite($page, $paragraph){
        $sql = 'UPDATE paragraph SET content = ?
                WHERE tagnameID =
                  (SELECT t.id from tagname t, website w
                   WHERE t.websiteID = w.id
                   AND w.name = ?
                   AND t.name = ?)
                AND lang = ? ';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->set($paragraph->content);
        $sqlQuery->set($page);
        $sqlQuery->set($paragraph->tagnameID);
        $sqlQuery->set($paragraph->lang);

        return $this->executeUpdate($sqlQuery);
    }
}
?>