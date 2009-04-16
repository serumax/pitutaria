<div class="settings picture">
<h2><?=__('Profile Picture',true)?></h2>
<div class="form">
	<?=$form->create('User', array('url'=>array('controller'=>'settings', 'action'=>'picture'), 'class'=>'simple-form', 'enctype'=>'multipart/form-data')); ?>
	<?=$form->input('avatar', array('type'=>'file')); ?>
	<?=$form->submit(__('save', true)); ?>
	<?=$form->end(); ?>
</div>










</div>