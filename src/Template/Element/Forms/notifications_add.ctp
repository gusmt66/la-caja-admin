<?php	
	echo $this->Form->create($noti);
			echo $this->Form->label('Mensaje'); 
			echo $this->Form->input('message', ['label' => false, 'placeholder' => 'Mensaje', 'type' => 'textarea','class'=>'form-control']);

			echo $this->Form->label('Sección:');
			echo '<select name="link" class="form-control">';
				echo '<option value="profile">Perfil</option>';
				echo '<option value="events">Agenda</option>';
				echo '<option value="contacts">Contactos</option>';
				echo '<option value="information">Ubicación</option>';
				echo '<option value="survey">Encuesta</option>';
				echo '<option value="trivia_start">Trivia</option>';
				//echo '<option value="treasure">Búsqueda del tesoro</option>';
				echo '<option value="books">Contenidos E-Learning</option>';
			echo '</select>';
		echo '<div class="clear"></div>';
		echo '<br>';
		echo $this->Form->submit('GUARDAR', ['label' => false, 'class' => 'btn btn-success']);
	echo $this->Form->end(); 
?>