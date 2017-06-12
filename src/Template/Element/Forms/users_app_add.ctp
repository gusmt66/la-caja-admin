<?php	
	echo $this->Form->create($user);
			echo $this->Form->label('Username'); 
			echo $this->Form->input('username', ['label' => false, 'placeholder' => 'Username','class'=>'form-control']);

			echo $this->Form->label('Nombre'); 
			echo $this->Form->input('name', ['label' => false, 'placeholder' => 'Nombre','class'=>'form-control']);

			echo $this->Form->label('Email'); 
			echo $this->Form->input('email', ['label' => false, 'placeholder' => 'Email','class'=>'form-control']);

			echo $this->Form->label('LinkedIn');
			echo $this->Form->input('linkedin', ['label' => false, 'placeholder' => 'LinkedIn','class'=>'form-control']);

			//echo $this->Form->label('Tipo de Usuario');
			//echo $this->Form->input('user_type', ['label' => false, 'placeholder' => 'Tipo de Usuario','class'=>'form-control']);

			echo $this->Form->label('Empresa');
			echo $this->Form->input('company', ['label' => false, 'placeholder' => 'Empresa','class'=>'form-control']);
			
			echo $this->Form->label('Cargo');
			echo $this->Form->input('job_title', ['label' => false, 'placeholder' => 'Cargo','class'=>'form-control']);
		
/*			echo $this->Form->label('Activado:');
			echo '<select name="active" class="form-control">';
				echo '<option value="1">SI</option>';
				echo '<option value="0">NO</option>';
			echo '</select>';
*/
			echo $this->Form->label('Contrase«Ða');
			echo $this->Form->input('password', ['label' => false, 'placeholder' => 'Contrase«Ða','class'=>'form-control']);

			echo $this->Form->label('Repetir Contrase«Ða');
			echo $this->Form->input('password_activation', ['label' => false, 'placeholder' => 'Repetir Contrase«Ða','type'=>'password','class'=>'form-control']);

			echo '<div class="clear"></div>';
			echo '<br>';

			echo $this->Form->submit('GUARDAR', ['label' => false, 'class' => 'btn btn-success']);
	echo $this->Form->end(); 
?>