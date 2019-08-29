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
    $(".dataTables_filter").hide();


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
                data.asc = $('#ascpr').val();
                data.desc = $('#descpr').val();
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            //"targets": [ 0 ], //first column / numbering column
            //"orderable": false, //set not orderable
        },
        ],
 
    });
 
    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });
});


