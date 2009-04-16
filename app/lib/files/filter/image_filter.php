<?php 
	require_once('file_filter.php');
	class ImageFilter extends FileFilter{
		
		var $allowedTypes = array(
			'image/jpeg', 
			'image/jpg', 
			'image/png', 
			'image/gif', 
			'image/x-png', 
			'image/pjpeg'
		);
		
		function filter($file){
			if (empty($file['type'])){
				return false;
			}
			if (!in_array($file['type'], $this->allowedTypes)){
				return false;
			}
			return true;
		}
	}
