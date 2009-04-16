<?php
    if  ($session->check('Message.auth')) $session->flash('auth');
?>

<?php if (!$param): ?>
	<div class="create-form form">
		<?php
		echo $form->create('User', array('action' => 'create'));
		echo $form->input('name', array('label'=>__('Name', true)));
		echo $form->input('last_name', array('label'=>__('Last Name', true)));
		echo $form->input('username', array('label'=>__('Email', true)));
		echo $form->input('password', array('label'=>__('password', true)));	
		echo $form->end(__('add', true));
		?>
	</div>
<?php endif; ?>

<?php if ($param=="thank"): ?>
	 <div class="thank">
	 	<h1>Gracias por registrarte</h1>
	 	<ul>
			<li>Revisa tu email para completar el proceso de registro</li>
			<li>Debes activar tu cuenta haciendo click en el link del email</li>
	 	</ul>

	 	<p>Si tu email no es  <?php echo $loggedUser['Account']['username'];?>  puedes cambiarlo aquí:</p>


	 	<div class="create-form form">
			<?php
			echo $form->create('User', array('action' => 'create'));
			echo $form->input('email', array('label'=>__('Email', true)));
			echo $form->end(__('add', true));
			?>
		</div>

		<p class="alert">Revisa la carpeta de correo no deseado o spam</p>
	</div>
<?php endif; ?>
