<?php
/* SVN FILE: $Id: auth.php 7961 2008-12-25 23:21:36Z gwoo $ */

/**
 * Authentication component
 *
 * Manages user logins and permissions.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller.components
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision: 7961 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-25 21:21:36 -0200 (jue, 25 dic 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

App::import(array('Router', 'Security'));

/**
 * Authentication control component class
 *
 * Binds access control with user authentication and session management.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller.components
 */
App::import('Core', 'Auth');

class FileHandlerComponent extends Object{
	
	var $dstfolder = 'c:\\wd\\resources\\avatar\\';
	
	var $nameProcessor = null;
	var $filters = null;
	
	function addNameProcessor($processor){
		$this->nameProcessor = $processor;
	}
	
	function addFilter($filter){
		if (empty($this->filter)){
			$this->filters = array();
		}
		$this->filters[] = $filter;
	}
	
	function filter($file){
		if (empty($this->filters)){
			return true;
		}
		foreach($this->filters as $filter){
			$pass = $filter->filter($file);
			if (!$pass){
				return false;
			}
		}
		return true;
	}
	function getNameProcessor(){
		if (!$this->nameProcessor){
			echo "as";
			importLib('files/name/name_processor');
			$this->nameProcessor = new NameProcessor();
		}
		return $this->nameProcessor;
	}
	
	function handleUpload($upload){
		$this->error = null;
		pr($upload);
		
		if (empty($upload['tmp_name'])){
			$this->error = 'no_file';
			return null;
		}
		
		if (!$this->filter($upload)){
			$this->error = 'invalid_file_type';
			return false;
		}
		
		$dstname = $this->dstfolder . $this->getNameProcessor()->getName($upload['name']);
		pr($dstname);
		
		if (copy($upload['tmp_name'], $dstname)){
			return $dstname;
		}
		$this->error = 'unknown_error';
		return false;
		
	}

}
?>