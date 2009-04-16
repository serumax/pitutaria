<?php 
	class NameProcessor{
		function getname($name){
			
			$n = strrpos($name, '.');
			
			if ($n>0){
				$ext = substr($name, $n+1); 
			} else {
				$ext = '';
			}
			
			$dstname = String::uuid();
			$dstname = $dstname;
			
			if ($ext){
				$dstname .= '.' . $ext;
			}
			
			return $dstname;
		}
	}
