<?php 
	$this->layout = 'layout'; 
?>
<?= $this->Flash->render() ?>
<title>Editar Notificación Push | La Caja</title>
<div class="panel panel-primary" style="margin: 20px;">
	<div class="panel-heading">
	    <h3 class="panel-title">Editar Notificación</h3>
	</div>
<div class="panel-body">
	<div class="form-group">
		<div class="table-responsive">
				<?= $this->element('Forms/notifications_edit') ?>
		</div>
	</div>
</div>