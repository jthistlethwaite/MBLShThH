<?php
/*
 * QLM (Qulm) - "A writing utensil"
* (c) 2013 iadnah - iadnah@uplinklounge.com
*
* QLM is a general purpose library for working with linguistic
* and mystic symbols.
*/
class QLM {

	public static $quote_style = ENT_HTML5;
	public static $charset = "UTF-8";

	public static function chr($code)
	{
		return html_entity_decode("&#x". $code. ";", self::$quote_style, self::$charset);
	}
	
	public static function wecho($text, $extraClass = '')
	{
		if (strlen($extraClass > 0))
		{
			$extra = " $extraClass";
		}
		else { $extra = ''; }
		
		echo "<span class=\"qlmChar". $extra. "\">$text</span>";
	}

/*
CREATE TABLE names ( first_name VARCHAR(50),
                     last_name VARCHAR(50)
                   )
CHARACTER SET utf8 COLLATE utf8_general_ci; 

*/


}

class QLM_Symbol {
	protected $cid;				// character ID
	protected $name;			// name of the character
	protected $unicode;			// unicode value of the character
	protected $utf8;			// raw UTF-8 character
	protected $meaning;			// meaning of the character
	protected $row777;			// row of liber777 the character should be attributed to
	protected $gematriaValue;	// numeric value of the character for numerology
	protected $language;		// pointer to the class of the language the character belongs to

	public function __construct( 
			$name = null,
			$unicode = null,
			$meaning = '',
			$row777 = -1,
			$gematriaValue = 0,
			&$language = null)
		{
			$this->set('name', $name);
			$this->set('unicode', $unicode);
			$this->set('utf8', QLM::chr($unicode));
			$this->set('meaning', $meaning);
			$this->set('row777', $row777);
			$this->set('gematriaValue', $gematriaValue);
			$this->set('language', $language);
		}
	
	public function set($field, $value)
	{
		switch ($field) {
			case 'cid':
				$this->cid = $value;
				break;
			case 'name':
				$this->name = $value;
				break;
			case 'unicode':
				$this->unicode = $value;
				break;
			case 'utf8':
				$this->utf8 = $value;
				break;
			case 'meaning':
				$this->meaning = $value;
				break;
			case 'row777':
				$this->row777 = $value;
				break;
			case 'gematriaValue':
				$this->gematriaValue = $value;
				break;
			case 'language':
				$this->language = $value;
				break;
				
			default:
				return false;
		}
	}
}


class QLM_language {

	protected $name = '';		// name of the language
	protected $desc = '';		// description of the language
	protected $charCount = 0;	// number of characters in language
	
	protected $charStorage = array();
	
	public function import(QLM_Symbol $symbol)
	{
		$this->charStorage[] = $symbol;
		$this->charCount = count($this->charStorage);
	}
	
}

?>