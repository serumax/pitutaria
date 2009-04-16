<?php
class Type extends AppModel {

	var $name = 'Type';
	
	function get($key){
		
		$type = $this->find(
			'first',
			array(
				'conditions'=>array('Type.type'=>$key),
				'recursive'=>-1,
				'fields'=>array('Type.id')
			)
		);
		
		if (empty($type)){
			return null;
		}
		
		return $type['Type']['id'];
	
	}

}
?>