<?php
/* SVN FILE: $Id: tree.php 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 * Tree behavior class.
 *
 * Enables a model object to act as a node-based tree.
 *
 * PHP versions 4 and 5
 *
 * CakePHP :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2006-2008, Cake Software Foundation, Inc.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2006-2008, Cake Software Foundation, Inc.
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP Project
 * @package       cake
 * @subpackage    cake.cake.libs.model.behaviors
 * @since         CakePHP v 1.2.0.4487
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-19 00:16:01 -0200 (vie, 19 dic 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for file
 *
 * Long description for file
 *
 * @package       cake
 * @subpackage    cake.cake.libs.model.behaviors
 */
class CacheableBehavior extends ModelBehavior {

	var $errors = array();
	var $_defaults = array(
	);
/**
 * Initiate Tree behavior
 *
 * @param object $model
 * @param array $config
 * @return void
 * @access public
 */
	function setup(&$model, $config = array()) {
		if (!is_array($config)) {
			$config = array('type' => $config);
		}
		$settings = array_merge($this->_defaults, $config);
		$this->model = $model;
		$this->settings[$model->alias] = $settings;
	}
	
	/**
	 * After save method. Called after all saves
	 *
	 * Clear cache
	 *
	 * @param AppModel $model
	 * @param boolean $created indicates whether the node just saved was created or updated
	 * @return boolean true on success, false on failure
	 * @access public
	 */
	function afterSave(&$model, $created) {
		//echo "hola soy el aftersave de Cacheable en Model." . $model->name;
	}
	
	function beforeFind(&$model, $queryData) {
		$this->settings[$model->alias]['_tmp_queryData'] = $queryData;
		if (empty($queryData['cache'])){
			return true;
		}
		$cache = $this->_cacheParameters($model->name, $queryData, 10000);
		$cachedData = Cache::read($cache['key']);
		if (!empty($cachedData)){
			return am($queryData, array('data'=>$cachedData));
		}
		return true; 
	}
	
	function afterFind(&$model, $results, $primary){
		if (empty($this->settings[$model->alias]['_tmp_queryData']['cache'])){
			return true;
		}
		$cache = $this->_cacheParameters($model->name, $this->settings[$model->alias]['_tmp_queryData'], 10000);
		Cache::write($cache['key'], $results, 10000);
	}
	
	function _cacheKey($prefix, $options = array()){
		return $this->model->name . '.' . $prefix . '.' . md5(serialize($options));
	}
	
	function _cacheParameters($prefix, $options = array(), $duration = '1 hour'){
		return array(
			'key' => $this->_cacheKey($prefix, $options),
			'duration' => $duration
		);
	}	
}
?>