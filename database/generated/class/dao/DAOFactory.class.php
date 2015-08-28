<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return EventDAO
	 */
	public static function getEventDAO(){
		return new EventMySqlExtDAO();
	}

	/**
	 * @return EventImageDAO
	 */
	public static function getEventImageDAO(){
		return new EventImageMySqlExtDAO();
	}

	/**
	 * @return LanguageDAO
	 */
	public static function getLanguageDAO(){
		return new LanguageMySqlExtDAO();
	}

	/**
	 * @return ParagraphDAO
	 */
	public static function getParagraphDAO(){
		return new ParagraphMySqlExtDAO();
	}

	/**
	 * @return TagcontentDAO
	 */
	public static function getTagcontentDAO(){
		return new TagcontentMySqlExtDAO();
	}

	/**
	 * @return TagnameDAO
	 */
	public static function getTagnameDAO(){
		return new TagnameMySqlExtDAO();
	}

	/**
	 * @return UserDAO
	 */
	public static function getUserDAO(){
		return new UserMySqlExtDAO();
	}

	/**
	 * @return WebsiteDAO
	 */
	public static function getWebsiteDAO(){
		return new WebsiteMySqlExtDAO();
	}


}
?>