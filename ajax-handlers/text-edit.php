<?php
    include_once("../database/generated/include_dao.php");

    $textid = $_POST["textedit-textid"];
    $textcontent = $_POST["textedit-textcontent"];
    $language = $_POST["textedit-language"];
    $website = $_POST["textedit-website"];

    //TODO: store contents to the database
    if ($textid != "" && $textcontent != "") {
        // store tagname and paragraph content
        $paragraph = new Paragraph();
        $paragraph->lang = $language;
        $paragraph->tagnameID = $textid;
        $paragraph->content = $textcontent;
        DAOFactory::getParagraphDAO()->updateByWebsite($website, $paragraph);

        echo "success";
    }
    else{
        echo "Error updating the database";
    }