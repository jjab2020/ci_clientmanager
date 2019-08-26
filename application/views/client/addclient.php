<div class="jumbotron">
	<h3>Ajouter Client</h3>
</div>
<div class="container">
	<?php echo form_open("addclientr",['class'=>'form-horizontal']); ?>
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
					Nom client
				</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'nomClient','class'=>'form-control','placeholder'=>'Nom client','value'=>set_value('nomClient')]);     ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('nomClient','<div class="text-danger">','</div>');?>
		</div>

	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Prenom Client
				</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'prenomClient','class'=>'form-control','placeholder'=>'Prenom Client','value'=>set_value('prenomClient')]);     ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('prenomClient','<div class="text-danger">','</div>')?>
		</div>

	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Age Client
				</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'ageClient','class'=>'form-control','placeholder'=>'Age Client']);     ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('ageClient','<div class="text-danger">','</div>')?>
		</div>

	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Courriel Client
				</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'courrielClient','class'=>'form-control','placeholder'=>'Courriel Client']);     ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('courrielClient','<div class="text-danger">','</div>')?>
		</div>

	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Adresse Client
				</label>
				<div class="col-md-9">
					<?php echo form_input(['name'=>'adresseClient','class'=>'form-control','placeholder'=>'Adresse Client']);     ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('adresseClient','<div class="text-danger">','</div>')?>
		</div>

	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Ville Client
				</label>
				<div class="col-md-9">
					<?php $options = array('' => 'Choisir Ville ...'); ?>
					<?php foreach($villes as $ville):?>
					<?php $options[$ville->idVille] = $ville->nomVille;?>
					<?php endforeach;?>
					<?php echo form_dropdown('idVille', $options, set_value('idVille'));?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('idVille','<div class="text-danger">','</div>')?>
		</div>

	</div>
	<button type="submit"	 class="btn btn-primary">Enregistrer</button>
	<?php echo anchor("client","Précédent",['class'=>'btn btn-primary']); ?>
	
	<?php echo form_close(); ?>

</div>
