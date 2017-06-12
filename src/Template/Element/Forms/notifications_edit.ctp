<?php	
	echo $this->Form->create($noti);
			echo $this->Form->label('Mensaje'); 
			echo $this->Form->input('message', ['label' => false, 'placeholder' => 'Mensaje', 'type' => 'textarea','class'=>'form-control']);
			echo $this->Form->label('Sección:');
			echo '<select name="link" class="form-control">';
			 if($noti['link']=="profile")
			{ 
			 	echo '<option value="profile" "selected">Perfil</option>';
			 	echo '<option value="events">Agenda</option>';
			 	echo '<option value="contacts">Contactos</option>';
			 	echo '<option value="information">Ubicación</option>';
			 	echo '<option value="survey">Encuesta</option>';
			 	echo '<option value="trivia_start">Trivia</option>';
		 		//echo '<option value="treasure">Búsqueda del tesoro</option>';
			 	echo '<option value="books">Contenidos E-Learning</option>';
			}
			 else if($noti['link']=="events") 
			{
			 	echo '<option value="events" "selected">Agenda</option>';
			 	echo '<option value="profile">Perfil</option>';
			 	echo '<option value="contacts">Contactos</option>';
			 	echo '<option value="information">Ubicación</option>';
			 	echo '<option value="survey">Encuesta</option>';
			 	echo '<option value="trivia_start">Trivia</option>';
		 		//echo '<option value="treasure">Búsqueda del tesoro</option>';
			 	echo '<option value="books">Contenidos E-Learning</option>';
			}
			 else if($noti['link']=="contacts") 
			{
			 	echo '<option value="contacts" "selected">Contactos</option>';
			 	echo '<option value="profile">Perfil</option>';
			 	echo '<option value="events">Agenda</option>';
			 	echo '<option value="information">Ubicación</option>';
			 	echo '<option value="survey">Encuesta</option>';
			 	echo '<option value="trivia_start">Trivia</option>';
		 		//echo '<option value="treasure">Búsqueda del tesoro</option>';
			 	echo '<option value="books">Contenidos E-Learning</option>';
			}
			 else if($noti['link']=="information")
			{
			 	echo '<option value="information" "selected">Ubicación</option>';
			 	echo '<option value="profile">Perfil</option>';
			 	echo '<option value="events">Agenda</option>';
			 	echo '<option value="contacts">Contactos</option>';
			 	echo '<option value="survey">Encuesta</option>';
			 	echo '<option value="trivia_start">Trivia</option>';
		 		//echo '<option value="treasure">Búsqueda del tesoro</option>';
			 	echo '<option value="books">Contenidos E-Learning</option>';
			}
			 else if($noti['link']=="survey")
			{	
			 	echo '<option value="survey" "selected">Encuesta</option>';
			 	echo '<option value="profile">Perfil</option>';
			 	echo '<option value="events">Agenda</option>';
			 	echo '<option value="contacts">Contactos</option>';
			 	echo '<option value="information">Ubicación</option>';
			 	echo '<option value="trivia_start">Trivia</option>';
		 		//echo '<option value="treasure">Búsqueda del tesoro</option>';
			 	echo '<option value="books">Contenidos E-Learning</option>';
			}
			 else if($noti['link']=="trivia_start") 
			{
			 	echo '<option value="trivia_start" "selected">Trivia</option>';
			 	echo '<option value="profile">Perfil</option>';
			 	echo '<option value="events">Agenda</option>';
			 	echo '<option value="contacts">Contactos</option>';
			 	echo '<option value="information">Ubicación</option>';
			 	echo '<option value="survey">Encuesta</option>';
		 		//echo '<option value="treasure">Búsqueda del tesoro</option>';
			 	echo '<option value="books">Contenidos E-Learning</option>';
			}
			/* else if($noti['link']=="treasure") 
		 	{
		 		echo '<option value="treasure" "selected">Búsqueda del tesoro</option>';
		 		echo '<option value="profile">Perfil</option>';
			 	echo '<option value="events">Agenda</option>';
			 	echo '<option value="contacts">Contactos</option>';
			 	echo '<option value="information">Ubicación</option>';
			 	echo '<option value="survey">Encuesta</option>';
			 	echo '<option value="trivia_start">Trivia</option>';
			 	echo '<option value="books">Contenidos E-Learning</option>';
		 	}*/
			 else 
			{
			 	echo '<option value="books" "selected">Contenidos E-Learning</option>';
				echo '<option value="profile">Perfil</option>';
			 	echo '<option value="events">Agenda</option>';
			 	echo '<option value="contacts">Contactos</option>';
			 	echo '<option value="information">Ubicación</option>';
			 	echo '<option value="survey">Encuesta</option>';
			 	echo '<option value="trivia_start">Trivia</option>';
		 		//echo '<option value="treasure">Búsqueda del tesoro</option>';
			}
			echo '</select>';
		echo '<div class="clear"></div>';
		echo '<br>';
		echo $this->Form->submit('MODIFICAR', ['label' => false, 'class' => 'btn btn-success']);
	echo $this->Form->end(); 
?>