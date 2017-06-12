<?php
	echo $this->Form->create();
		echo $this->Form->label('Usuario');
		echo $this->Form->input('username', ['label' => false, 'placeholder' => 'Usuario']);

		echo $this->Form->label('Contraseña');
		echo $this->Form->input('password', ['label' => false, 'placeholder' => 'Contraseña']);

		echo $this->Form->submit('ENVIAR', ['label' => false, 'class' => 'btn btn-success']);
	echo $this->Form->end(); 
?>