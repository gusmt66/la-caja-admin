<?php 
	$this->layout = 'layout'; 
?>
<title>Editar Usuario App | La Caja</title>
<?= $this->Flash->render() ?>
<div class="panel panel-primary" style="margin: 20px;">
	<div class="panel-heading">
	    <h3 class="panel-title">Editar Usuario App</h3>
	</div>
<div class="panel-body">
	<div class="form-group">
		<div class="table-responsive">
				<?= $this->element('Forms/users_app_edit') ?>
		</div>
	</div>
</div>
		