<?php
class SettingsController extends AppController {

	var $name = 'Settings';
	var $uses = array('User');
	var $components = array('FileHandler');
	var $helpers = array('Html', 'Form');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	function index(){
		
		
	}
	
	function account(){
		
		if (!empty($this->data)){
			$user = $this->data;
			$user['User']['id']=$this->getLoggedUser();
			if ($this->User->update($user)){
				echo "ok";
			}
		} else {
			$user = $this->User->getProfileInfo($this->getLoggedUser());
			$this->data = $user;
		}
		
		$this->render('index');
	}
	
	function picture(){
		if (!empty($this->data)){
			pr($this->data);
			if (!empty($this->data['User']['avatar'])){
				importLib('files.name.name_processor');
				importLib('files.filter.image_filter');
				importLib('files.filter.size_filter');
				$this->FileHandler->addNameProcessor(new NameProcessor());
				$this->FileHandler->addFilter(new ImageFilter());
				$this->FileHandler->addFilter(new SizeFilter(array('type'=>'max', 'size'=>200*KB)));
				$dst = $this->FileHandler->handleUpload($this->data['User']['avatar']);
				if (!$dst){
					pr($this->FileHandler->error);
				}
				
			}
		}
	}
	
	function thumb(){
		$src_name = 'C:\wd\resources\avatar\49693b52-ff90-4607-a487-0698a7592085.jpg';
		$dst_name = 'C:\wd\resources\avatar\thumbs\200\49693b52-ff90-4607-a487-0698a7592085.jpg';
		$w = 250;
		$h = 187;
		$size = $this->getSize($src_name);
		//$this->scaleImage($src_name, $dst_name, .75);
		$this->scaleFit($src_name, $dst_name, array('w'=>'100', 'h'=>'250'));
		die();
		$this->createthumb($src_name, $dst_name, $w, $h);
		
		die();
	}
	
	function scaleImage($src, $dst_name, $factor){
		$srcSize = $this->getSize($src);
		$srcRect = am($srcSize, array('x'=>0, 'y'=>0));
		$dstRect = array('x'=>0, 'y'=>0, 'w' => $srcRect['w'] * $factor, 'h' => $srcRect['h'] * $factor);
		$this->createThumb($src, $dst_name, $srcRect, $dstRect);
	}
	function scaleFit($src, $dst_name, $dstRestrictions){

		$srcSize = $this->getSize($src);
		if (count($dstRestrictions)>2){ return; }
		switch (count($dstRestrictions)){
			case 1:
				$dimension = array_keys($dstRestrictions);
				$dimension = $dimension[0];
				$value = $dstRestrictions[$dimension];
				if ($dimension=='w'){
					$factor = $value / $srcRect['w'];
				}
				if ($dimension=='h'){
					$factor = $value / $srcRect['h'];
				}
				
				if (!isset($factor)){ return; }
				
				return $this->scaleImage($src, $dst_name, $factor);
			break;
			case 2:
				$f1 = $dstRestrictions['w'] / $srcSize['w'];
				$f2 = $dstRestrictions['h'] / $srcSize['h'];
				$factor = max($f1, $f2);
				$dstRect = array('x'=>0, 'y'=>0, 'w'=>$dstRestrictions['w'], 'h'=>$dstRestrictions['h']);
				$srcRect = array();
				$srcRect['w'] = $dstRestrictions['w']/$factor;
				$srcRect['h'] = $dstRestrictions['h']/$factor;
				$srcRect['x'] = floor($srcSize['w'] - $srcRect['w'])/2;
				$srcRect['y'] = floor($srcSize['h'] - $srcRect['h'])/2;
				return $this->createThumb($src, $dst_name, $srcRect, $dstRect);
			break;
		}
		
		
	}
	
	function getImage($src){
		if (is_string($src)){
			$system=explode('.',$src);
			if (preg_match('/jpg|jpeg/',$system[count($system)-1])){
				$src_img=imagecreatefromjpeg($src);
			}
			if (preg_match('/png/',$system[count($system)-1])){
				$src_img=imagecreatefrompng($src);
			}
			return $src_img;
		} else {
			return $src;
		}
		
	}
	function getSize($src){
		$src_img = $this->getImage($src);
		
		$w=imageSX($src_img);
		$h=imageSY($src_img);
		
		return array('w'=>$w, 'h'=>$h);
		 
	}
	function createThumb($src, $dst_name, $src_rect, $dst_rect){
		$src_img = $this->getImage($src);
		$dst_img=ImageCreateTrueColor($dst_rect['w'], $dst_rect['h']);
		
		imagecopyresampled(
			$dst_img, 
			$src_img, 
			$dst_rect['x'], 
			$dst_rect['y'], 
			$src_rect['x'],
			$src_rect['y'],
			$dst_rect['w'], 
			$dst_rect['h'], 
			$src_rect['w'],
			$src_rect['h']
		); 
		
		$system=explode('.',$src);
		$type = $system[count($system)-1];
		switch ($type){
			case 'png':
				imagepng($dst_img,$dst_name); 
				break;
			default:
				imagejpeg($dst_img,$dst_name); 
		}
		
		imagedestroy($dst_img); 
		imagedestroy($src_img); 

	}
	
	function mq(){
		$k = 0;
		while($k<1){
			importLib('system.system');
			System::notify('clearcache', array('type'=>'needs', 'id'=>2009, 'timestamp'=>time()));
			//sleep(1);
			$k++;
		}
		die();
	}
	
}
?>