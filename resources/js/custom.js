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
        'columnDefs': [{ 'orderable': false, 'targets': [0,3,4,5] }, { "width": "3%", "targets": 0 }],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true  
        });        
    $('#dtSupplier').DataTable({
        order: [[1, 'asc']],
        'columnDefs': [{ 'orderable': false, 'targets': [0, 2,3, 4, 5] }, { "width": "3%", "targets": 0 }],

        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true  
        });

    $('#dtProductSales').DataTable({
            'columnDefs': [{ 'orderable': false, 'targets': [2,3] }],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
            });

        $('#dtReceipts').DataTable({
        'columnDefs': [{ 'orderable': false, 'targets': [5,2,3] }],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
        });             

        $('#dtSaleSummary').DataTable({
            'columnDefs': [{ 'orderable': false, 'targets': [3,3] }],
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

//Item Edit
$(document).ready(function () {  

    $('#modalItemEdit').on('show.bs.modal', function(event)
    {
        var button = $(event.relatedTarget)
        var id = button.data("id")
        var item_name = button.data("item_name")
        var supplier_id = button.data("sup_id")
        var cat_id = button.data("cat_id")
        var cost = button.data("cost")
        var price = button.data("price")
        var quantity = button.data("quantity")
           

        var modal = $(this)
        modal.find('.modal-body #item_id').val(id)    
        modal.find('.modal-body #item_name').val(item_name)
        modal.find('.modal-body #item_cost').val(cost) 
        modal.find('.modal-body #item_price').val(price)  
        modal.find('.modal-body #item_quantity').val(quantity) 

        if(supplier_id)
        {modal.find('.modal-body #editSupplier').val(supplier_id)}
        else 
        modal.find('.modal-body #editSupplier').val("empty")
        if(cat_id)
        modal.find('.modal-body #editCategories').val(cat_id) 
        else 
        modal.find('.modal-body #editCategories').val("empty")
        $('.editsupplierPickeselect').selectpicker('refresh',
        {
            liveSearch: true
        })  
        

       /* //modalLabel
        $('#itemModalLabel').text(function(i, oldText) {
            return oldText === 'Edit Category' ? item_name : oldText;
        });*/
    });
 
}); 

//Item Del
$(document).ready(function () {  

    $('#modalItemDel').on('show.bs.modal', function(event)
    {
        var button = $(event.relatedTarget)
        var id = button.data("id")

        var modal = $(this)
        modal.find('.modal-body #item_id').val(id)   
    });
 
}); 

//product show
$(document).ready(function () {  

    $('#modalInfo').on('show.bs.modal', function(event)
    {
        
        var button = $(event.relatedTarget)
        var productID = button.data("id")
        $.ajax({
            url:"/admin/salesummary/create",
            method: "Get",
            dataType:"JSON",
            success:function(data)
            {   
               
                for (var i = 0; i < data.array.length; i++) {
                    $('#tdDate').html(data.array[i].date);
                    $('#tdPrice').html(data.array[i].total_price);
                    //addTR()
                    }
                
                
            }
            
        })  
        
    });

}); 

function addTR()
{
    var tr='<tr>'+
    '<td id="tdDate"></td>'+
    '<td id="tdPrice"></td>'+
    '</tr>';                                                                                       
    
    $('#shProducts').append(tr);
};


//Product_MultipleInline
$(document).ready(function(){
    var count = 1;
    $('#add').click(function(){
    count = count + 1;
    var html_code = "<tr id='row"+count+"'>";
    html_code += "<td contenteditable='true' class='item_name'></td>";
    html_code += "<td contenteditable='true' class='item_code'></td>";
    html_code += "<td contenteditable='true' class='item_desc'></td>";
    html_code += "<td contenteditable='true' class='item_price' ></td>";
    html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
    html_code += "</tr>";  
    $('#crud_table').append(html_code);
   });
   
    $(document).on('click', '.remove', function(){
    var delete_row = $(this).data("row");
    $('#' + delete_row).remove();
    });
   
   $('#save').click(function(){
   var item_name = [];
   var item_code = [];
   var item_desc = [];
   var item_price = [];
   $('.item_name').each(function(){
   item_name.push($(this).text());
   });
   $('.item_code').each(function(){
   item_code.push($(this).text());
   });
   $('.item_desc').each(function(){
   item_desc.push($(this).text());
   });
   $('.item_price').each(function(){
   item_price.push($(this).text());
   });

   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

   $.ajax({
   url:"/admin/product/post",
   method:"POST",
   dataType: "json",
   data:{item_name:item_name},
   success:function(data){
    /*alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
        $('tr#'+i+'').remove();
    }*/
   }
    });
    
    });
   
    
   
      });


//Dan

$('tbody').delegate('.quantity,.budget','keyup',function(){
    var tr=$(this).parent().parent();
    var quantity=tr.find('.quantity').val();
    var budget=tr.find('.budget').val();
    var amount=(quantity*budget);
    tr.find('.amount').val(amount);
    total();
});
function total(){
    var total=0;
    $('.amount').each(function(i,e){
        var amount=$(this).val()-0;
    total +=amount;
});
$('.total').html('&#8369;'+total+".00 ");    
}
$('.addRow').on('click',function(){
    addRow();
});
function addRow()
{
    var tr='<tr>'+
    '<td><input type="text" name="product_name[]" class="form-control " required=""></td>'+
    '<td><input type="text" name="quantity[]" class="form-control quantity" ></td>'+
    '<td><input type="text" name="budget[]" class="form-control budget"></td>'+
    ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+
    '<td><a href="#" class="btn btn-danger btn-md remove far fa-trash-alt"><i class="glyphicon glyphicon-remove"></i></a></td>'+
    '</tr>';
    $('tbody').append(tr);
};
$('body').on('click', '.remove', function(){
    var last=$('tbody tr').length;
    if(last==1){
        alert("you can not remove last row");
    }
    else{
         $(this).parent().parent().remove();
    }
 
});

//auto complete
$(document).ready(function(){

    $('#country_name').keyup(function(){ 
           var query = $(this).val();
           if(query != '')
           {
            var _token = $('input[name="_token"]').val();
            $.ajax({
             url:"{{ route('autocomplete.fetch') }}",
             method:"POST",
             data:{query:query, _token:_token},
             success:function(data){
              $('#countryList').fadeIn();  
                       $('#countryList').html(data);
             }
            });
           }
       });
   
       $(document).on('click', 'li', function(){  
           $('#country_name').val($(this).text());  
           $('#countryList').fadeOut();  
       });  
   
   });