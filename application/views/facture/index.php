<div class="jumbotron">
	<p><h3>Gestion des Factures:</h3></p>
</div>
<div class="container-fluid">
	<?php echo form_open("showpdf",['class'=>'form-horizontal']); ?>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Clients:
				</label>
				<div class="col-md-9">
				  <?php echo  $clientDropDown; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">
					Factures:
				</label>
				<div class="col-md-9">
				  <?php echo  $factureDropDown; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="my-4">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<button type="submit"	 class="btn btn-secondary float-left">Chercher</button>
				</div>
			</div>	
		</div>
	</div>
	<?php echo form_close(); ?>
