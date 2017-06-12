<?php 
	$this->layout = 'layout'; 
?>
<title>Editar Parametro General | La Caja</title>
<?= $this->Flash->render() ?>
<div class="panel panel-primary" style="margin: 20px;">
	<div class="panel-heading">
	    <h3 class="panel-title">Editar Parametro Global</h3>
	</div>
<div class="panel-body">
	<div class="form-group">
		<div class="table-responsive">
				<?= $this->element('Forms/global_parameters_edit') ?>
		</div>
	</div>
</div>