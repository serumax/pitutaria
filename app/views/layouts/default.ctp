<?php
/* SVN FILE: $Id: default.ctp 7945 2008-12-19 02:16:01Z gwoo $ */
/**
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
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-19 00:16:01 -0200 (vie, 19 dic 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('titulo'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('style');
		echo $html->css('forms');
		
		echo $scripts_for_layout;
	?>
</head>
<body>

	<div id="container">
		<div id="header">
			<h1><?php echo $html->link(__('skadi', true), '/'); ?></h1>
			<div class="top-menu">
				<? 
				$links = array();
				if (!empty($loggedUser)){ 
					$links[] = $loggedUser['User']['name'] . ' ' . $loggedUser['User']['last_name'];
					$links[] = $html->link(__('logout', true), array('controller'=>'users', 'action'=>'logout'));
				} else {
					$links[] = $html->link(__('login', true), array('controller'=>'users', 'action'=>'login'));
					$links[] = $html->link(__('register', true), array('controller'=>'users', 'action'=>'create'));
				} 
				?>
				<?=join(' | ', $links)?> 
			</div>
		</div>
		<div id="content">
<?php
	if ($session->check('Message.flash')) {
		$session->flash();
	}
	if ($session->check('Message.auth')) {
		$session->flash('auth');
	}
?>
			<?php $session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
			<?=$this->element('navigation/languages') ?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>