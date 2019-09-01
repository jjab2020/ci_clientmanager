$(document).ready(function() {
    // datable client

    $('#client').DataTable({
    	"searching": false,
    	"bProcessing": true,
        "serverSide": true,
        "pageLength" : 10,
        "ajax": {
            url : "getclient",
            type : 'GET'
        }
    });
    


    //datatables produit
    table = $('#produit').DataTable({ 

        "bProcessing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "pageLength" : 10,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "listsproduit",
            "type": "POST",
            "data": function ( data ) {
                data.cle = $('#searchpr').val();
                data.categ = $('#categ').val();
                data.sort = $('#sortpr').val();
                data.direction = $("input[name='sortp']:checked").val();


            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0,1,2,3], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

     // datable commandes

     cmdTable = $('#commandes').DataTable({
        "searching": false,
        "sortable" : false,
        "bProcessing": true,
        "serverSide": true,
        "paging": false,
        "ajax": {
            url : "../../getListOfArticles",
            type : 'POST'
        }
    });

     $('#btn-add-command').click(function(){ 
        var data = cmdTable.rows().data();
        var result=[];
        var rows = cmdTable.rows().nodes();
        for(var i=0;i<rows.length;i++)
        {
            obj = {};
            if(parseInt($(rows[i]).find("td:eq(4)").find('input').val(), 10)>0){
                obj["quantite"] =  $(rows[i]).find("td:eq(4)").find('input').val();
                obj["codearticle"] = $(rows[i]).find("td:eq(0)").html();
                result.push(obj);    
            }
        }
        $.ajax({
          url: "../../add_command",
          data: JSON.stringify({ 'articles': result,'idClient':$('#idClient').val()}),
          type : 'POST',
          success: function(response){
            var data = $.parseJSON(response);
            if(data.status == 'success'){
               cmdTable.ajax.reload();  //just reload table
               $('input').val('');//empty input
               //show success
               $("#result").html('<div class="alert alert-success"><button type="button" class="close">×</button>Commande passé avec succée!</div>');
               window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
                }, 5000);
            $('.alert .close').on("click", function(e){
                $(this).parent().fadeTo(500, 0).slideUp(500);
             });
            }
            else if(data.status == 'error'){
              
            }
        }
    });
    });

     //dropdown client

     $('#dropdclient').on('change',function(){
        $.ajax({
            url: 'facturebyclient',
            type: "POST",
            data: { idClient: $(this).val()} ,
         }).done(function(data) {
            var result = $.parseJSON(data);
            $('#facture').append('<option value="">Veuillez choisir une facture</option>');
            $.each(result, function(index, value) {
               $('#facture').append('<option value='+index+'>'+'Facture en date de: ' + value +'</option>');
            });
            
         }).fail(function() {
            
         }).always(function() {
         
        });
    });

     $('#btn-clear-command').click(function(){ 
        $('input').val('');
    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#searchpr').val('');
        table.ajax.reload();  //just reload table
    });

    $(".dataTables_filter").hide();
    $(".dataTables_info").hide();
    

});

