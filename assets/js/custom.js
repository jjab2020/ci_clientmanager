$(document).ready(function() {
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
    


    //datatables
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


