$(document).ready(function() {
    $('#book-table').DataTable({
    	"pageLength" : 5,
        "ajax": {
            url : "getclient",
            type : 'GET'
        }
    });
});
