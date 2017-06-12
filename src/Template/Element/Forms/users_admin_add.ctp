<?php	
	echo $this->Form->create($user);
		echo $this->Form->label('Usuario');
		echo $this->Form->input('username', ['label' => false, 'placeholder' => 'Username','class'=>'form-control']);

		echo $this->Form->label('Contraseña');
		echo $this->Form->input('password', ['label' => false, 'placeholder' => 'Contraseña','class'=>'form-control']);

		echo $this->Form->label('Repetir Contraseña');
		echo $this->Form->input('password_confirmation', ['label' => false, 'placeholder' => 'Repetir Contraseña','type'=>'password','class'=>'form-control']);
		
		echo '<div class="clear"></div>';
		echo '<br>';

		echo $this->Form->submit('GUARDAR', ['label' => false, 'class' => 'btn btn-success']);
	echo $this->Form->end(); 
?>