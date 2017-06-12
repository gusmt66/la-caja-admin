<?php 
	$this->layout = 'layout'; 
?>
<title>Parametros Generales | La Caja</title>
<?= $this->Flash->render() ?>
<div class="panel panel-primary" style="margin: 20px;">
	<div class="panel-heading">
	    <h3 class="panel-title">Parametros Generales</h3>
	</div>
	<div class="panel-body">
	<div class="form-group">
	<?= $this->Html->link('Añadir', ['controller' => 'GlobalParameters', 'action' => 'add'],['class'=>'btn btn-success right'],['type'=>'button']) ?><br><br>
</div>
    
		    <div class="table-responsive">
		        <table id="example" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>Codigo</th>
			                <th>Descripcion</th>
			                <th>Valor</th>
			                <th>Acciones</th>
			            </tr>
			        </thead>
		       		 <?php
						foreach ($global as $key => $globals) 
				   		{
					    			if(($key+1)%1==1)
					    			{
					    				echo '<tr>';
					    			}
										echo '<td title="'.$globals['code'].'">'.$globals['code'].'</td>';
										echo '<td title="'.$globals['description'].'">'.$globals['description'].'</td>';
										echo '<td title="'.$globals['value'].'">'.$globals['value'].'</td>';
										echo '<td><a>'.$this->Html->link('Editar', ['controller' => 'GlobalParameters', 'action' => 'edit', $globals['id']],['class'=>'btn btn-primary'],['type'=>'button']).'</a>&nbsp;&nbsp;';
										echo '<a>'.$this->Html->link(' Eliminar', ['controller' => 'GlobalParameters', 'action' => 'delete', $globals['id']],['class'=>'btn btn-danger','onclick'=>'return confirm("Desea eliminar este usuario?")']).'</a>';
										'</td>';
									if(($key+1)%1==0 || $key+1 == sizeof($globals))
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