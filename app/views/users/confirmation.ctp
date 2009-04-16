<?php


	$f =  $html->tag('h1',"Gracias por Confirmar  tu cuenta");
	$f .=  $html->tag('p',"Haz validado correctamente tu cuenta:");
	$f .=  $html->tag('p',$loggedUser['Account']['username']);
	$f .=  $html->tag('p','Cuéntanos un poco más de ti');
		$myform = $form->create('profile', array('action' => 'validate'));
		$myform .= '<label for="day">' . __('birthday', true). " ";
		$myform .= $form->select('day', array_merge(array(  __('day', true) ), range(1,31)), '0', array("class" => "day", "id" => "day"), false);
		$myform .= $form->select('month', array_merge(array( __('month', true) ), range(1,12)), '0', array("class" => "month", "id" => "month"), false);
		$myform .= $form->select('year', array_merge(array( __('year', true) ), range(1950,1990)), '0', array("class" => "year", "id" => "year"), false);
		$myform .= '</label>';
		$myform .= '<label for="sex">' . __('sex', true). " ";
		$myform .= $form->radio('sex', array("male" => "male", "female" => "female" ), array("class" => 'radio', 'legend' => false));
		$myform .= '</label>';
		$myform .= $form->select('month', array_merge(array( __('Seleccione un país', true) ), array('Argentina', 'Bolivia', 'Chile', 'Uruguay', 'Paraguay', 'México')), '0', array("class" => "month", "id" => "month"), false);
		$myform .=$form->input('avatar', array('type' => 'file', 'label' => 'Sube tu foto'));
		$myform .= $form->end(__('add', true));
	$f .=  $html->tag('div',$myform, array("class"=>"create-form form") );
	$f .=  $html->tag('p','Revisa la carpeta de correo no deseado o spam');

	echo  $html->tag('div',$f, array("class"=>"confirm") );
?>



