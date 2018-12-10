$(document).ready(function () {
    $('#dtBasicExample').DataTable({
        'columnDefs': [{ 'orderable': false, 'targets': [4,5] }],
        
        });
    $('.dataTables_length').addClass('bs-select');

    $('#modalEdit').on('show.bs.modal', function(e) {
        var data_id = ($(event.relatedTarget).attr('data-id'));
        var email = $('dsadasdasd').text();
        $(this).find('#editEmail').attr('value', email);
        });

        $('#modaledit').on('show.bs.modal', function(e) {
            var data_id = ($(event.relatedTarget).attr('data-id'));
            var email = $('.emali_'+data_id).text();
            $(this).find('#InputEmail').attr('value', email);
        });
    });

