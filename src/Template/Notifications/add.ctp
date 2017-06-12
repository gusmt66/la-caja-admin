<?php 
	$this->layout = 'layout'; 
?>
<title>Añadir Notificación Push | La Caja</title>
<?= $this->Flash->render() ?>
<div class="panel panel-primary" style="margin: 20px;">
	<div class="panel-heading">
	    <h3 class="panel-title">Añadir Notificaciones</h3>
	</div>
<div class="panel-body">
	<div class="form-group">
		<div class="table-responsive">
				<?= $this->element('Forms/notifications_add') ?>
		</div>
	</div>
</div>
