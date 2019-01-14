$(document).ready(function () {
        $('#dtBasicExample').DataTable({
            'columnDefs': [{ 'orderable': false, 'targets': [4,5] }],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
            });

    $('#dtCategories').DataTable({
        'columnDefs': [{ 'orderable': false, 'targets': [1,2] }],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
        });

    $('#dtItem').DataTable({
        order: [[1, 'asc']],
        'columnDefs': [{ 'orderable': false, 'targets': [0, 5, 6] }, { "width": "3%", "targets": 0 }],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true  
        });        
    $('#dtSupplier').DataTable({
        order: [[1, 'asc']],
        'columnDefs': [{ 'orderable': false, 'targets': [0, 2,3, 4] }, { "width": "3%", "targets": 0 }],

        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true  
        });
    
        $('.dataTables_length').addClass('bs-select');    
        
        //Pickers
        $('.categoryPicker').selectpicker({
            liveSearch: true
        });

        $('.supplierPicker').selectpicker({
            liveSearch: true
        });
});

//input number max-min filter
$(document).ready(function() {

    $('.filterNum').on('input', function(ev) {
      var $this = $(this);
      var maxlength = $this.attr('max').length;
      var minlength = $this.attr('min').length;
      var value = $this.val();

      if ($(this).val() > maxlength)
      {
        $this.val(value.substr(0, maxlength));
      }
      else if ($(this).val() < minlength)
      {
        $this.val(value.substr(0, minlength));
      } 
    });

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


//Category Edit
$(document).ready(function () {  

    $('#modalCategoryEdit').on('show.bs.modal', function(event)
    {
        var button = $(event.relatedTarget)
        var category_name = button.data("category")
        var id = button.data("id")

        var modal = $(this)
        modal.find('.modal-body #cat_edit').val(category_name)
        modal.find('.modal-body #cat_id').val(id)   
    });
 
}); 

//Category Del
$(document).ready(function () {  

    $('#modalCategoryDel').on('show.bs.modal', function(event)
    {
        var button = $(event.relatedTarget)
        var id = button.data("id")

        var modal = $(this)
        modal.find('.modal-body #cat_id').val(id)   
    });
 
}); 

//Supplier
$(document).ready(function() {
      //Supplier Edit
      $('#modalSupplierEdit').on('show.bs.modal', function(event)
    {
        
        var button = $(event.relatedTarget)
        var id = button.data("id")
        var supplier_name = button.data("sname")
        var email= button.data("semail")
        var phone = button.data("sphone")
        var address = button.data("saddress")
        var note = button.data("snote")
           

        var modal = $(this)
        modal.find('.modal-body #supplier_id').val(id)    
        modal.find('.modal-body #supplier_name').val(supplier_name)
        modal.find('.modal-body #email').val(email) 
        modal.find('.modal-body #pNum').val(phone) 
        modal.find('.modal-body #address').val(address) 
        modal.find('.modal-body #note').val(note)  
    });
} );


//Category Del
$(document).ready(function () {  

    $('#modalSupplierDel').on('show.bs.modal', function(event)
    {
        var button = $(event.relatedTarget)
        var id = button.data("id")

        var modal = $(this)
        modal.find('.modal-body #supplier_id').val(id)   
    });
 
}); 