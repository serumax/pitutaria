<div class="settings home">
<h2><?=__('settings',true)?></h2>
<?
	$tabs = array(
		'account'=>array('label'=>'account'),
		'picture'=>array('label'=>'picture')
	);
?>
<ul class="tabs"> 
<?foreach($tabs as $tab){ ?>
	<li><?=__($tab['label'], true)?></li>
<? } ?>
</ul>




<div class="account form">
	<?=$form->create('User', array('url'=>array('controller'=>'settings', 'action'=>'account'), 'class'=>'simple-form')); ?>
	<?=$form->input('name'); ?>
	<?=$form->input('last_name'); ?>
	<?=$form->input('nickname'); ?>
	<?=$form->submit(__('change', true)); ?>
	<?=$form->end(); ?>
</div>










</div>