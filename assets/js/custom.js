$(document).ready(function() {
    $('#client').DataTable({
    	"searching": false,
    	"bProcessing": true,
        "serverSide": true,
    	"pageLength" : 20,
        "ajax": {
            url : "getclient",
            type : 'GET'
        }
    });
    $(".dataTables_filter").hide();
});


