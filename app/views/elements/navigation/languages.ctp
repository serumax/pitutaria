<?
	$currentLanguage = 'es';
	$languages = array(
		'en'=>'english',
		'spa'=>'spanish'
	);
	
	$links = array();
	foreach($languages as $code=>$language){
		if ($currentLanguage==$code){
			$links[] = __($language, true);
		} else {
			$links[] = $html->link(__($language, true), '/' . $code);
		}
	}
	
?>
<div class="languages">
	<?=join(' &middot; ', $links)?>
</div>