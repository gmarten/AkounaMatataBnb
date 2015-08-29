<?php
/**
 * Created by PhpStorm.
 * User: gmarten
 * Date: 29/08/15
 * Time: 02:16
 */

// get the tags and contents from the database according to the selected language
$website = DAOFactory::getWebsiteDAO()->loadTagsByIDAndLanguage($_SESSION["page"], $_SESSION["language"]);
echo "<script type='text/javascript'>$(document).ready(function() {";
$tagsCount = count($website->tags);
for ($i = 0; $i < $tagsCount; $i++){
    echo "$('#". $website->tags[$i]->name ."').html('". $website->tags[$i]->content ."');";
}
echo  "}) </script>\n";