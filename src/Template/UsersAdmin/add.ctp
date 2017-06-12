<?php 
	$this->layout = 'layout'; 
?>
<title>Añadir Usuario Admin | La Caja</title>
<?= $this->Flash->render() ?>
<div class="panel panel-primary" style="margin: 20px;">
	<div class="panel-heading">
	    <h3 class="panel-title">REG&Iacute;STRESE</h3>
	</div>
<div class="panel-body">
	<div class="form-group">
		<div class="table-responsive">
				<?= $this->element('Forms/users_admin_add') ?>
		<p>
					Si ya eres Usuario, ingresa <?= $this->Html->link('aqui', ['controller' => 'UsersAdmin', 'action' => 'login']);?>
		</p>
		</div>
	</div>
</div>
