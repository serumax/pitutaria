<?
uses('String');

define('SERVER_ADDRESS', 'http://www.needish.com');

class TranslationsShell extends Shell
{
	
	function generate()
	{
		$localeDir = APP_PATH . 'locale' . DS;
		App::import('Model', 'Language');
		$Language = new Language();
		$languages = $Language->find('all');
		foreach($languages as $language){
			mkdir($localeDir . $language['Language']['code']);
			mkdir($localeDir . $language['Language']['code'] . DS . 'LC_MESSAGES');				
		}
		
	}
	
}
?>