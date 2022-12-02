var ft_ctr = document.getElementById('ft_ctr').value;
var s_ctr = document.getElementById('s_ctr').value;
$(document).ready(function(){

    // var country = $("#country");
    // var w_country = $("#witness_country");
    // populateCountry(country);
    // populateCountry(w_country);

    // if(s_ctr>0){
    //     for (var i = 1; i <= s_ctr; i++) {
    //         var country = $("#s_country_" + i);
    //         populateCountry(country);
    //     }
    // }

    // if(ft_ctr>0){
    //     for (var i = 1; i <= ft_ctr; i++) {
    //         var country = $("#ft_country_" + i);
    //         populateCountry(country);
    //     }
    // }

    $("#report_status").select2({
        tags: true
    });

    const form = document.querySelector('#form');
    form.addEventListener('submit', function (e) {
        // prevent the form from submitting
        e.preventDefault();

        document.getElementById("btnSubmit").disabled = true;
        $(".loading-icon").removeClass("hide");
        $(".btn-txt").text(" PLEASE WAIT...");

        if (form.checkValidity() === false) {
            e.preventDefault();
            e.stopPropagation();

            form.classList.add("was-validated");
            
            toastr.error(
                'Please fill up the required fields first and try again!',
                'Error!',
                {
                    timeOut: 3000,
                    fadeOut: 1000,
                    onHidden: function () {
                        document.getElementById("btnSubmit").disabled = false;
                        $(".loading-icon").addClass("hide");
                        $(".btn-txt").text("SUBMIT");
                    }
                }
            );

            return;
        }

        // form.classList.add("was-validated");
        var formData = new FormData(form);
        console.log(formData);
        $.ajax({
            url: base_url + "Complaint/update",
            type: "POST",
            data:  formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
        }).done(function (response) {

            console.log(response);

            if (response.status) {

                toastr.success(
                    response.message,
                    'Success!',
                    {
                        timeOut: 3000,
                        fadeOut: 1000,
                        onHidden: function () {
                            window.location.reload();
                        }
                    }
                );

                return;
            }

            toastr.error(
                response.message,
                'Error!',
                {
                    timeOut: 3000,
                    fadeOut: 1000,
                    onHidden: function () {
                        document.getElementById("btnSubmit").disabled = false;
                        $(".loading-icon").addClass("hide");
                        $(".btn-txt").text("SUBMIT");
                    }
                }
            );
            
        });
    });

    $("#s_add").click(function () {
        document.getElementById('s_ctr').value = s_ctr++;
        $('#s_ctr').val(s_ctr);

        $("#s_table").append('<tr>' +
            '<td> ' +
                '<div class="mb-3 pb-3 border-bottom">' +
                    '<input type="hidden" id="s_id_'+ s_ctr +'" name="s_id_'+ s_ctr +'" value="0" />' +
                    '<div class="row">' +
                        '<div class="col-md-4 mb-2">' +
                            '<label for="s_first_name_'+ s_ctr +'" class="form-label">First Name</label>' +
                            '<input type="text" id="s_first_name_'+ s_ctr +'" name="s_first_name_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter first name here">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 mb-2">' +
                            '<label for="s_middle_name_'+ s_ctr +'" class="form-label">Middle Name</label>' +
                            '<input type="text" id="s_middle_name_'+ s_ctr +'" name="s_middle_name_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter middle name here">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 mb-2">' +
                            '<label for="s_last_name_'+ s_ctr +'" class="form-label">Last Name</label>' +
                            '<input type="text" id="s_last_name_'+ s_ctr +'" name="s_last_name_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter last name here">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 mb-2">' +
                            '<label for="s_business_name_'+ s_ctr +'" class="form-label">Business Name</label>' +
                            '<input type="text" id="s_business_name_'+ s_ctr +'" name="s_business_name_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter business name here">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 mb-2">' +
                            '<label for="s_ip_address_'+ s_ctr +'" class="form-label">IP Address</label>' +
                            '<input type="text" id="s_ip_address_'+ s_ctr +'" name="s_ip_address_'+ s_ctr +'" class="form-control form-control-sm" placeholder="123.45.67.89 or 2001:abc::1234">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 mb-2">' +
                            '<label for="s_website_'+ s_ctr +'" class="form-label">Website</label>' +
                            '<input type="text" id="s_website_'+ s_ctr +'" name="s_website_'+ s_ctr +'" class="form-control form-control-sm" placeholder="http://www.example.com/">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-6 mb-2">' +
                            '<label for="s_mobile_number_'+ s_ctr +'" class="form-label">Mobile Number <code>(numbers only)</code></label>' +
                            '<input type="number" id="s_mobile_number_'+ s_ctr +'" name="s_mobile_number_'+ s_ctr +'" class="form-control form-control-sm" min="0" placeholder="09XXXXXXXXX">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-6 mb-2">' +
                            '<label for="s_email_'+ s_ctr +'" class="form-label">Email Address <code>(janedoe@email.com)</code></label>' +
                            '<input type="email" id="s_email_'+ s_ctr +'" name="s_email_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter email address here">' +
                            '<div class="invalid-feedback">Please provide a valid email!</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row">' +
                        '<div class="col-md-4 mb-2">' +
                          '<label for="s_country_'+ s_ctr +'" class="form-label">Country </label>' +
                          '<select id="s_country_'+ s_ctr +'" name="s_country_'+ s_ctr +'" class="form-control form-control-sm">' +
                          '</select>' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 mb-2">' +
                          '<label for="s_province_'+ s_ctr +'" class="form-label">Province </label>' +
                          '<input type="text" id="s_province_'+ s_ctr +'" name="s_province_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter province here">' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 mb-2">' +
                          '<label for="s_city_'+ s_ctr +'" class="form-label">City </label>' +
                          '<input type="text" id="s_city_'+ s_ctr +'" name="s_city_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter city here">' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-8 mb-2">' +
                          '<label for="s_address_'+ s_ctr +'" class="form-label">Address </label>' +
                          '<textarea id="s_address_'+ s_ctr +'" name="s_address_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter address here" rows="2"></textarea>' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4">' +
                          '<label for="s_zip_code_'+ s_ctr +'" class="form-label">Zip Code </label>' +
                          '<input type="text" id="s_zip_code_'+ s_ctr +'" name="s_zip_code_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter zip code here">' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row pt-2">' +
                        '<div class="col-md-12"><button type="button" class="btn btn-sm btn-danger w-100 s-remove-tr"><i class="fas fa-minus"></i>&nbsp;&nbsp;Remove</button></div>' +
                    '</div>' +
                '</div>' +
            '</td>' +
        '</tr>');

        var country = $('#s_country_' + s_ctr);
        populateCountry(country);

    });

    $(document).on('click', '.s-remove-tr', function () {
        $(this).parents('tr').remove();

        document.getElementById('s_ctr').value = s_ctr--;
        $('#s_ctr').val(s_ctr);
    });

    $(document).on('click', '#s-btn-delete', function (e) {

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
                    url: base_url + "Suspect/delete/" + id,
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
                                    window.location.reload();
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

    $("#ft_add").click(function () {
        document.getElementById('ft_ctr').value = ft_ctr++;
        $('#ft_ctr').val(ft_ctr);

        $("#ft_table").append('<tr>' +
            '<td>' +
                '<div class="mb-3 pb-3 border-bottom">' +
                    '<input type="hidden" id="ft_id_'+ ft_ctr +'" name="ft_id_'+ ft_ctr +'" value="0" />' +
                    '<div class="row">' +
                        '<div class="col-md-12">' +
                            '<div class="card pb-0">' +
                                '<div class="border-bottom p-1 bg-primary">' +
                                    '<div class="d-md-flex align-items-center">' +
                                        '<div class="mr-sm-2">' +
                                            '<h6 class="card-title p-1 m-1 text-light">TRANSACTION TYPE</h6>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="card-body">' +
                                    '<div class="row">' +
                                        '<div class="col-md-4 mb-2">' +
                                            '<label for="ft_rgv_transaction_type_id_'+ ft_ctr +'" class="form-label">Transaction Type <code>*</code> </label>' +
                                            '<select id="ft_rgv_transaction_type_id_'+ ft_ctr +'" name="ft_rgv_transaction_type_id_'+ ft_ctr +'" class="form-control form-control-sm" required>' +
                                            '</select>' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                        '<div class="col-md-8">' +
                                            '<label for="ft_others_'+ ft_ctr +'" class="form-label">If others, please specify here <code id="ft_req_others_" hidden>*</code></label>' +
                                            '<input type="text" id="ft_others_'+ ft_ctr +'" name="ft_others_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter transaction type here">' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="row">' +
                                        '<div class="col-md-4 mb-2">' +
                                            '<label for="ft_transaction_date_'+ ft_ctr +'" class="form-label">Date <code>*</code></label>' +
                                            '<input type="date" id="ft_transaction_date_'+ ft_ctr +'" name="ft_transaction_date_'+ ft_ctr +'" class="form-control form-control-sm" required>' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                        '<div class="col-md-3 mb-2">' +
                                            '<label for="ft_is_sent_'+ ft_ctr +'" class="form-label">Is the money sent? </label>' +
                                            '<select id="ft_is_sent_'+ ft_ctr +'" name="ft_is_sent_'+ ft_ctr +'" class="form-control form-control-sm" required>' +
                                                '<option value="0">No</option>' +
                                                '<option value="1" selected>Yes</option>' +
                                            '</select>' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                        '<div class="col-md-5">' +
                                            '<label for="ft_amount_'+ ft_ctr +'" class="form-label">Amount <code>*</code></label>' +
                                            '<input type="number" id="ft_amount_'+ ft_ctr +'" name="ft_amount_'+ ft_ctr +'" min="0" max="999999999" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control form-control-sm" placeholder="0.00" required>' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-md-12">' +
                            '<div class="row">' +
                                '<div class="col-md-6">' +
                                    '<div class="card pb-0">' +
                                        '<div class="border-bottom p-1 bg-primary">' +
                                            '<div class="d-md-flex align-items-center">' +
                                                '<div class="mr-sm-2">' +
                                                    '<h4 class="card-title p-1 m-1 text-light">SENDER\'S BANK INFO</h4>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="card-body">' +
                                            '<div class="row">' +
                                                '<div class="col-md-12 mb-2">' +
                                                    '<label for="ft_s_bank_name_'+ ft_ctr +'" class="form-label">Bank Name </label>' +
                                                    '<input type="text" id="ft_s_bank_name_'+ ft_ctr +'" name="ft_s_bank_name_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter bank name here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_s_account_name_'+ ft_ctr +'" class="form-label">Account Name </label>' +
                                                    '<input type="text" id="ft_s_account_name_'+ ft_ctr +'" name="ft_s_account_name_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter account name here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_s_account_no_'+ ft_ctr +'" class="form-label">Account No. </label>' +
                                                    '<input type="text" id="ft_s_account_no_'+ ft_ctr +'" name="ft_s_account_no_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter account no. here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_s_country_'+ ft_ctr +'" class="form-label">Country </label>' +
                                                    '<select id="ft_s_country_'+ ft_ctr +'" name="ft_s_country_'+ ft_ctr +'" class="form-control form-control-sm">' +
                                                    '</select>' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_s_province_'+ ft_ctr +'" class="form-label">Province </label>' +
                                                    '<input type="text" id="ft_s_province_'+ ft_ctr +'" name="ft_s_province_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter province here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_s_city_'+ ft_ctr +'" class="form-label">City </label>' +
                                                    '<input type="text" id="ft_s_city_'+ ft_ctr +'" name="ft_s_city_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter city here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_s_zip_code_'+ ft_ctr +'" class="form-label">Zip Code </label>' +
                                                    '<input type="text" id="ft_s_zip_code_'+ ft_ctr +'" name="ft_s_zip_code_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter zip code here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-md-12 mb-2">' +
                                                    '<label for="ft_s_address_'+ ft_ctr +'" class="form-label">Address </label>' +
                                                    '<textarea id="ft_s_address_'+ ft_ctr +'" name="ft_s_address_'+ ft_ctr +'" class="form-control form-control-sm" rows="2" placeholder="Enter address here"></textarea>' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-md-6">' +
                                    '<div class="card pb-0">' +
                                        '<div class="border-bottom p-1 bg-primary">' +
                                            '<div class="d-md-flex align-items-center">' +
                                                '<div class="mr-sm-2">' +
                                                    '<h4 class="card-title p-1 m-1 text-light">RECIEPIENT\'S BANK INFO</h4>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="card-body">' +
                                            '<div class="row">' +
                                                '<div class="col-md-12 mb-2">' +
                                                    '<label for="ft_r_bank_name_'+ ft_ctr +'" class="form-label">Bank Name </label>' +
                                                    '<input type="text" id="ft_r_bank_name_'+ ft_ctr +'" name="ft_r_bank_name_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter bank name here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_r_account_name_'+ ft_ctr +'" class="form-label">Account Name </label>' +
                                                    '<input type="text" id="ft_r_account_name_'+ ft_ctr +'" name="ft_r_account_name_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter account name here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6">' +
                                                    '<label for="ft_r_account_no_'+ ft_ctr +'" class="form-label">Account No. </label>' +
                                                    '<input type="text" id="ft_r_account_no_'+ ft_ctr +'" name="ft_r_account_no_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter account no. here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_r_country_'+ ft_ctr +'" class="form-label">Country </label>' +
                                                    '<select id="ft_r_country_'+ ft_ctr +'" name="ft_r_country_'+ ft_ctr +'" class="form-control form-control-sm">' +
                                                    '</select>' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_r_province_'+ ft_ctr +'" class="form-label">Province </label>' +
                                                    '<input type="text" id="ft_r_province_'+ ft_ctr +'" name="ft_r_province_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter province here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_r_city_'+ ft_ctr +'" class="form-label">City </label>' +
                                                    '<input type="text" id="ft_r_city_'+ ft_ctr +'" name="ft_r_city_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter city here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6 mb-2">' +
                                                    '<label for="ft_r_zip_code_'+ ft_ctr +'" class="form-label">Zip Code </label>' +
                                                    '<input type="text" id="ft_r_zip_code_'+ ft_ctr +'" name="ft_r_zip_code_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter zip code here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-md-12 mb-2">' +
                                                    '<label for="ft_r_address_'+ ft_ctr +'" class="form-label">Address </label>' +
                                                    '<textarea id="ft_r_address_'+ ft_ctr +'" name="ft_r_address_'+ ft_ctr +'" class="form-control form-control-sm" rows="2" placeholder="Enter address here"></textarea>' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="row">' +
                                '<div class="col-md-12"><button type="button" class="btn btn-sm btn-danger w-100 ft-remove-tr"><i class="fas fa-minus"></i>&nbsp;&nbsp;Remove</button></div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</td>' +
        '</tr>');

        var rgv_transaction_type = $('#ft_rgv_transaction_type_id_' + ft_ctr);
        populateDDL(rgv_transaction_type, 'Transaction Types');

        var s_country = $('#ft_s_country_' + ft_ctr);
        populateCountry(s_country);

        var r_country = $('#ft_r_country_' + ft_ctr);
        populateCountry(r_country);

        // onTransactionTypeChanged(ft_ctr);
    });

    $(document).on('click', '.ft-remove-tr', function () {
        $(this).parents('tr').remove();

        document.getElementById('ft_ctr').value = ft_ctr--;
        $('#ft_ctr').val(ft_ctr);
    });

    $(document).on('click', '#f-btn-delete', function (e) {

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
                    url: base_url + "Victim_financial_transaction/delete/" + id,
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
                                    window.location.reload();
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

});

function populateCountry(input) {

    $.ajax({
        url: base_url + 'SystemReferenceCountry/getAll',
        type: "POST",
        dataType: 'json'
    }).done(function (response) {
        var len = response.length;

        $(input).empty();
        $(input).append("<option value=''>Please select one ...</option>");
        for (var i = 0; i < len; i++) {
            var id = response[i]['id'];
            var name = response[i]['name'];
            
            // if (name == "Philippines") {
            //     $(input).append("<option value='" + name + "' selected>" + name + "</option>");
            // }
            $(input).append("<option value='" + name + "'>" + name + "</option>");
        }
    });
}

function populateDDL(input, group_code) {

    $.ajax({
        url: base_url + 'SystemReferenceGroupValue/getBy_GroupCodeDepartmentDivision',
        data: { 'group_code': group_code, 'department_id': 0, 'division_id': 0},
        type: "POST",
        dataType: 'json'
    }).done(function (response) {
        var len = response.length;

        $(input).empty();
        $(input).append("<option value=''>Please select one ...</option>");
        for (var i = 0; i < len; i++) {
            var id = response[i]['id'];
            var name = response[i]['name'];
            $(input).append("<option value='" + id + "'>" + name + "</option>");
        }
    });

}