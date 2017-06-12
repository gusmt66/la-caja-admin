<?php 
	$this->layout = 'layout'; 
?>
<title>Usuarios App | La Caja</title>
<script>
$(document).ready(function(){
	var filter=$('#seleccion').val();
	var originalHref = $('#filter').attr('href');
	addFilter(filter);
	$('#seleccion').on('change',function(){
	addFilter(this.value);
	});
   
    function addFilter(filter)
    {
    	$('#filter').attr('href',originalHref+'/'+filter);
    }
});
    </script>
	<?= $this->Flash->render()  ?>
<div class="panel panel-primary" style="margin: 20px;">
<div class="panel-heading">
    <h3 class="panel-title">Usuarios</h3>
</div>
<div class="panel-body">
	<div class="form-group">
	  <?= $this->Html->link('Añadir Nuevo Usuario', ['controller' => 'UsersApp', 'action' => 'add'],['class'=>'btn btn-success right'],['type'=>'button']) ?>
	  <label for="seleccion">ACTIVADO</label>
	  <select id="seleccion" class="form-control" style="width: 70px;display:inline;">
	    <option value="1">SI</option>
	    <option value="0">NO</option>
	  </select>
	  <?php
	  $value =''; 
	   echo $this->Html->link('Filtro', ['controller' => 'UsersApp', 'action' => 'index',$value],['class'=>'btn btn-default','id'=>'filter'],['type'=>'button']); ?>
	  <br><br>
	</div>

    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nombre</th>
                <th>LinkedIn</th>
                <th>Email</th>
                <th>Activado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php
			foreach ($user as $key => $users) 
	   		{
		    			if(($key+1)%1==1)
		    			{
		    				echo '<tr>';
		    			}
							echo '<td title="'.$users['username'].'">'.substr($users['username'],0,40).'</td>';
							echo '<td title="'.$users['name'].'">'.substr($users['name'],0,40).'</td>';
							echo '<td title="'.$users['linkedin'].'">'.substr($users['linkedin'],0,40).'</td>';
							echo '<td title="'.$users['email'].'">'.substr($users['email'],0,40).'</td>';
							if($users['active'] == 1)
							{
								echo '<td title="SI">SI</td>';
							}
							else
							{
								echo '<td title="NO">NO</td>';

							}
							echo '<td><a>'.$this->Html->link('Editar', ['controller' => 'UsersApp', 'action' => 'edit', $users['id']],['class'=>'btn btn-primary'],['type'=>'button']).'</a>&nbsp;&nbsp;';
							echo '<a>'.$this->Html->link(' Eliminar', ['controller' => 'UsersApp', 'action' => 'delete', $users['id']],['class'=>'btn btn-danger','onclick'=>'return confirm("Desea eliminar este usuario?")']).'</a>';
							'</td>';
						if(($key+1)%1==0 || $key+1 == sizeof($users))
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