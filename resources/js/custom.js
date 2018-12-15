$(document).ready(function () {
    $('#dtBasicExample').DataTable({
        'columnDefs': [{ 'orderable': false, 'targets': [4,5] }],
        });
    $('.dataTables_length').addClass('bs-select');  

    $('#dtCategories').DataTable({
        'columnDefs': [{ 'orderable': false, 'targets': [6,7] }],
        
        });
        $('.dataTables_length').addClass('bs-select');    
});



    
//Accounts Edit
$(document).ready(function () {  
      
    $('#modalEdit').on('show.bs.modal', function(event)
    {
        var button = $(event.relatedTarget)
        var firstname = button.data("fname")
        var lastname = button.data("lname")
        var email = button.data("email")
        var id = button.data("id")
        var role = button.data("role")

        var modal = $(this)
        modal.find('.modal-body #first_name').val(firstname)
        modal.find('.modal-body #last_name').val(lastname)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #user_id').val(id)  

        //role selector
        if(role == "admin")
        {

            modal.find('.modal-body #role').val("admin") 
        }
        else if(role == "owner")
        {
            modal.find('.modal-body #role').val("owner") 
        }
        else if(role == "captain crew")
        {
            modal.find('.modal-body #role').val("captain crew") 
        }
        else
        {
            modal.find('.modal-body #role').val("barista") 
        }

    });

}); 

//Accounts Del
$(document).ready(function () {  

    $('#modalDel').on('show.bs.modal', function(event)
    {
        var button = $(event.relatedTarget)
        var id = button.data("id")

        var modal = $(this)
        modal.find('.modal-body #user_id').val(id)  
    });
 
}); 
