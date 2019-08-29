<div class="jumbotron">
	<h3>Gestion des Produits:</h3>
</div>
<div class="container">
        
        <h3>Rechercher un article</h3>
        <br>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open("",['class'=>'form-horizontal','id'=>'form_product_search']); ?>
                    <div class="form-group">
                        <label for="search" class="col-sm-2 control-label">Mot clé:</label>
                        <div class="col-sm-4">
                          <?php echo form_input(['name'=>'search','id'=>'searchpr','class'=>'form-control','placeholder'=>'Mot clé','value'=>set_value('search')]);     ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categ" class="col-sm-2 control-label">Dans la catégorie:</label>
                        <div class="col-sm-4">
                           <?php echo form_dropdown('categ', $cat_list, set_value('categ'),['class'=>'form-control','id'=>'categ']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sort_column" class="col-sm-2 control-label">Trier par:</label>
                        <div class="col-sm-4">
                            <?php echo form_dropdown('triep', $products, set_value('triep'),['class'=>'form-control','id'=>'sortpr']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label">En ordre:</label>
                        <div class="col-sm-4">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="ascpr" name="asc" >
                              <label class="custom-control-label" for="asc">Croissant</label>
                            </div>
                            <!-- Default inline 3-->
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" class="custom-control-input" id="descpr" name="desc">
                              <label class="custom-control-label" for="desc">Décroissant</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button"  id="btn-filter"  class="btn btn-primary">Rechercher</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Effacer</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <table id="produit" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Code article</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>