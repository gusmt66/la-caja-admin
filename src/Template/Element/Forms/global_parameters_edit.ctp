<?php	
	echo $this->Form->create($global);
			echo $this->Form->label('Codigo');
			echo $this->Form->input('code', ['label' => false, 'placeholder' => 'Codigo','class'=>'form-control','disabled '=>'disabled']);

			echo $this->Form->label('Descripcion');
			echo $this->Form->input('description', ['label' => false, 'placeholder' => 'Descripcion','class'=>'form-control']);

			echo $this->Form->label('Valor');
			echo $this->Form->input('value', ['label' => false, 'placeholder' => 'Valor','class'=>'form-control']);
		echo '<div class="clear"></div>';
		echo '<br>';
		echo $this->Form->submit('MODIFICAR', ['label' => false, 'class' => 'btn btn-success']);
	echo $this->Form->end(); 
?>