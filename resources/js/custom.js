$(document).ready(function () {
    $('#dtBasicExample').DataTable({
        'columnDefs': [{ 'orderable': false, 'targets': [4,5] }],
        });
    $('.dataTables_length').addClass('bs-select');

    /*$('#modalEdit').on('show.bs.modal', function(e) {
        var data_id = ($(event.relatedTarget).attr('data-id'));
        var email = $('dsadasdasd').text();
        $(this).find('#editEmail').attr('value', email);
        });

        $('#modaledit').on('show.bs.modal', function(e) {
            var data_id = ($(event.relatedTarget).attr('data-id'));
            var email = $('.emali_'+data_id).text();
            $(this).find('#InputEmail').attr('value', email);
        });*/
        

        
        $("#dan2").click(function(){
            $("#edit_email").val("dasdsa");
        });
    });

// Code goes here

/*$(document).ready(function() {
   

    $('#dtBasicExample').on('click', 'tbody #dan2', function () {
        var data_row = table.row($(this).closest('tr')).data();

        
        $('#modalEdit').on('shown.bs.modal', function() {

            $('#edit_email').val(data_row.email);
            
        });

    });


});*/

/*$('#modalEdit').on('show.bs.modal', function (e) {
    // get information to update quickly to modal view as loading begins
    var opener=e.relatedTarget;//this holds the element who called the modal
     
     //we get details from attributes
    var firstname=$(opener).attr('first-name');
  
  //set what we got to our form
    $('#profileForm').find('[name="firstname"]').val(firstname);
     
  });*/


      
