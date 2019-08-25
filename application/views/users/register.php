<div class="jumbotron">
	<h3>Inscription</h3>
</div>
<div class="container">
	<?php echo form_open("signup",['class'=>'form-horizontal']); ?>
	<?php if($error = $this->session->flashdata('message')):?>
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert dismissible alert-success">
					<?php echo $error; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Utilisateur
				</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'nom','class'=>'form-control','placeholder'=>'Nom','value'=>set_value('nom')]);     ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('nom','<div class="text-danger">','</div>');?>
		</div>

	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Email
				</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email')]);     ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('email','<div class="text-danger">','</div>')?>
		</div>

	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Mot de passe
				</label>
				<div class="col-md-9">
					<?php echo form_password(['name'=>'motdepasse','class'=>'form-control','placeholder'=>'Mot de passe']);     ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('motdepasse','<div class="text-danger">','</div>')?>
		</div>

	</div>
	<button type="submit"	 class="btn btn-primary">S'enregistrer</button>
	<?php echo anchor("/","Précédent",['class'=>'btn btn-primary']); ?>
	
	<?php echo form_close(); ?>

</div>
