$(document).ready(function(){

    var table = $('#table').DataTable({
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
                }
            },
            'colvis'
        ],
        dom: 'Bfrtip',
        columnDefs: [
            { className: "dt-control", "targets": [ 0 ]},
            { targets: [1,5,6,7,8,9,10,11] , visible: false },
            { targets: [0,7] , orderable: false }
        ],
        lengthChange: false,
        bPaginate: true,
        bFilter: false
    });

    table.buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('dt-button-primary');
    
    table.on('click', 'td.dt-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // // Open this row
            row.child(format(table.row( this ).data())).show();
            tr.addClass('shown');
        }
    });

});

$(document).on('click', '#btn-reset-form', function (e) {
    // document.getElementById("form-filter").reset();
    const inputs = document.querySelectorAll('#searchString, #rgv_report_type_id, #date_received, #officer_on_case');

    inputs.forEach(input => {
        input.value = '';
    });

    document.getElementById('form-filter').submit();
});

$(document).on('click', '#btn-delete', function (e) {

    e.preventDefault();
    var id = $(this).data("id");

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: "POST",
                url: base_url + "Complaint/delete/" + id,
                dataType: "json",
            }).done(function (response) {

                if (response.status) {

                    toastr.success(
                        response.message,
                        'Success!',
                        {
                            timeOut: 2000,
                            fadeOut: 1000,
                            onHidden: function () {
                                window.location = base_url + "Complaint";
                            }
                        }
                    );

                    return;
                }

                toastr.error(
                    response.message,
                    'Error!'
                );

            });

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Delete cancelled. Your record is safe :)',
                'error'
            )
        }
    })

    e.preventDefault();
});

function format(d) {
    return (
        '<div class="row">'+
            '<div class="col-md-1">'+
                '' +
            '</div>' +
            '<div class="col-md-2 m-b-5">'+
                '<strong>Name of Complainant</strong>' +
            '</div>' +
            '<div class="col-md-9 m-b-5">'+
                d[5] +
            '</div>' +
        '</div>' +
        '<div class="row">'+
            '<div class="col-md-1">'+
                '' +
            '</div>' +
            '<div class="col-md-2 m-b-5">'+
                '<strong>Complaint Details</strong>' +
            '</div>' +
            '<div class="col-md-9 m-b-5">'+
                d[6] +
            '</div>' +
        '</div>' +
        '<div class="row">'+
            '<div class="col-md-1">'+
                '' +
            '</div>' +
            '<div class="col-md-2 m-b-5">'+
                '<strong>Officer-On-Case</strong>' +
            '</div>' +
            '<div class="col-md-9 m-b-5">'+
                d[7] +
            '</div>' +
        '</div>'+
        '<div class="row">'+
            '<div class="col-md-1">'+
                '' +
            '</div>' +
            '<div class="col-md-2 m-b-5">'+
                '<strong>Cybercrime Offenses</strong>' +
            '</div>' +
            '<div class="col-md-9 m-b-5">'+
                d[8] +
            '</div>' +
        '</div>'+
        '<div class="row">'+
            '<div class="col-md-1">'+
                '' +
            '</div>' +
            '<div class="col-md-2 m-b-5">'+
                '<strong>Report Status</strong>' +
            '</div>' +
            '<div class="col-md-9 m-b-5">'+
                d[9] +
            '</div>' +
        '</div>'+
        '<div class="row">'+
            '<div class="col-md-1">'+
                '' +
            '</div>' +
            '<div class="col-md-2 m-b-5">'+
                '<strong>Actions Taken</strong>' +
            '</div>' +
            '<div class="col-md-9 m-b-5">'+
                d[10] +
            '</div>' +
        '</div>'+
        '<div class="row">'+
            '<div class="col-md-1">'+
                '' +
            '</div>' +
            '<div class="col-md-2 m-b-5">'+
                '<strong>After Status Report</strong>' +
            '</div>' +
            '<div class="col-md-9 m-b-5">'+
                d[11] +
            '</div>' +
        '</div>'
    );
}