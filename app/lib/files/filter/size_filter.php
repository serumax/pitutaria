<?php 
	require_once('file_filter.php');
	class SizeFilter extends FileFilter{
		
		var $allowedTypes = array(
			'image/jpeg', 
			'image/jpg', 
			'image/png', 
			'image/gif', 
			'image/x-png', 
			'image/pjpeg'
		);
		
		function __construct($options = array()){
			
			parent::__construct($options);
			
			$defaultOptions = array(
				'type'=>'max',
				'size'=>4*MB
			);
			
			$options = am($defaultOptions, $options);
			
			$this->options = $options;
		}
		
		function filter($file){

			switch($this->options['type']){
				case 'min':
					return $file['size']>=$this->options['size'];
					break;
				case 'max':
					return $file['size']<=$this->options['size'];
					break;
				default:
			}
			
			return true;
						
		}
	}
