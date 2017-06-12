<?php 
	$this->layout = 'layout'; 
?>
<title>Notificación Push | La Caja</title>
<?= $this->Flash->render() ?>
<div class="panel panel-primary" style="margin: 20px;">
<div class="panel-heading">
    <h3 class="panel-title">Notificaciones Push</h3>
</div>
<div class="panel-body">
	<div class="form-group">
	  <?= $this->Html->link('Añadir', ['controller' => 'Notifications', 'action' => 'add'],['class'=>'btn btn-success right'],['type'=>'button']) ?>
	  <br><br>
	</div>
	
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Mensaje</th>
                <th>Link</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php
			foreach ($noti as $key => $notis) 
	   		{
		    			if(($key+1)%1==1)
		    			{
		    				echo '<tr>';
		    			}
							echo '<td title="'.$notis['message'].'">'.substr($notis['message'],0,40).'</td>';
							if($notis['link'] == "Perfil")
							{
								echo '<td title="Perfil">Perfil</td>';
							}
							else if($notis['link'] == "Agenda")
							{
								echo '<td title="Agenda">Agenda</td>';
							}
							else if($notis['link'] == "Contactos")
							{
								echo '<td title="Contactos">Contactos</td>';
							}
							else if($notis['link'] == "Ubicación")
							{
								echo '<td title="Ubicación">Ubicación</td>';
							}
							else if($notis['link'] == "Encuesta")
							{
								echo '<td title="Encuesta">Encuesta</td>';
							}
							else if($notis['link'] == "Trivia")
							{
								echo '<td title="Trivia">Trivia</td>';
							}
							else if($notis['link'] == "Búsqueda del tesoro")
							{
								echo '<td title="Búsqueda del tesoro">Búsqueda del tesoro</td>';
							}
							else
							{
								echo '<td title="Contenidos E-Learning">Contenidos E-Learning</td>';
							}
		    				echo '<td>'.$notis['date'].'</td>';
							echo '<td>'.$this->Html->link('Editar', ['controller' => 'Notifications', 'action' => 'edit', $notis['id']],['class'=>'btn btn-primary'],['type'=>'button']).'&nbsp;&nbsp;';
							echo $this->Html->link(' Eliminar', ['controller' => 'Notifications', 'action' => 'delete', $notis['id']],['class'=>'btn btn-danger','onclick'=>'return confirm("Desea eliminar este push?")']);
							'</td>';
						if(($key+1)%1==0 || $key+1 == sizeof($notis))
						{
							echo '</tr>';	
						}
	    	} 
	        ?>
        </tbody>
    </table>
</div>
</div>
</div>