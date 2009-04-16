<?php
    if  ($session->check('Message.auth')) $session->flash('auth');
?>
<div class="login-form form"><?
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username', array('label'=>__('username', true)));
    echo $form->input('password', array('label'=>__('password', true)));
    echo '<a href="/users/forgot">' . __('forgot_username_or_password', true) . '</a>';
    echo $form->input('remember_me', array('label' => __('remember_me', true), 'type' => 'checkbox', 'class'=>'checkbox'));
    echo $form->end(__('login', true));
?>
</div>