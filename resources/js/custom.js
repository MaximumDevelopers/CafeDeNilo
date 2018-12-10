$(document).ready(function () {
    $('#dtBasicExample').DataTable({
        'columnDefs': [{ 'orderable': false, 'targets': [4,5] }],
        
        });
});

    $(document).ready(function() 
{
    $('.dataTables_length').addClass('bs-select');

    $('#modalEdit').on('show.bs.modal', function(event)
    {
        var button = $(event.relatedTarget)
        var firstname = button.data("fname")
        var lastname = button.data("lname")
        var email = button.data("email")
        var password = button.data("pword")
   
       

        var modal = $(this)

        modal.find('.modal-body #first_name').val(firstname)
        modal.find('.modal-body #last_name').val(lastname)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #password').val(password)
        modal.find('.modal-body #password-confirm').val(password)
        


    })
      
    });