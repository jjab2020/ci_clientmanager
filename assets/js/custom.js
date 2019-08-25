$(document).ready(function() {
    $('#client').DataTable({
    	"bProcessing": true,
        "serverSide": true,
    	"pageLength" : 20,
        "ajax": {
            url : "getclient",
            type : 'GET'
        }
    });
});
