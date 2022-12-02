// const isRequired = value => value === '' ? false : true;
var ft_ctr = document.getElementById('ft_ctr').value;
var s_ctr = document.getElementById('s_ctr').value;
$(document).ready(function(){

    var country = $("#country");
    var w_country = $("#w_country");
    populateCountry(country);
    populateCountry(w_country);

    isImpactingBusinessOperations();

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

        $.ajax({
            url: base_url + "OnlineComplaint/insert",
            type: "POST",
            data:  formData,
            contentType: false,
            cache: false,
            processData:false,
            dataType: 'json',
        }).done(function (response) {

            if (response.status) {

                swalWithBootstrapButtons.fire({
                    title: 'Success!',
                    text: response.message,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'Confirm',
                }).then(() => {
                    window.location = base_url + "OnlineComplaint/unsetUserData";
                });

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
                    '<div class="row">' +
                        '<div class="col-md-4 pb-3">' +
                            '<label for="s_first_name_'+ s_ctr +'" class="form-label">First Name</label>' +
                            '<input type="text" id="s_first_name_'+ s_ctr +'" name="s_first_name_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter first name here">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 pb-3">' +
                            '<label for="s_middle_name_'+ s_ctr +'" class="form-label">Middle Name</label>' +
                            '<input type="text" id="s_middle_name_'+ s_ctr +'" name="s_middle_name_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter middle name here">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 pb-3">' +
                            '<label for="s_last_name_'+ s_ctr +'" class="form-label">Last Name</label>' +
                            '<input type="text" id="s_last_name_'+ s_ctr +'" name="s_last_name_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter last name here">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 pb-3">' +
                            '<label for="s_business_name_'+ s_ctr +'" class="form-label">Business Name</label>' +
                            '<input type="text" id="s_business_name_'+ s_ctr +'" name="s_business_name_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter business name here">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 pb-3">' +
                            '<label for="s_ip_address_'+ s_ctr +'" class="form-label">IP Address</label>' +
                            '<input type="text" id="s_ip_address_'+ s_ctr +'" name="s_ip_address_'+ s_ctr +'" class="form-control form-control-sm" placeholder="123.45.67.89 or 2001:abc::1234">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 pb-3">' +
                            '<label for="s_website_'+ s_ctr +'" class="form-label">Website</label>' +
                            '<input type="text" id="s_website_'+ s_ctr +'" name="s_website_'+ s_ctr +'" class="form-control form-control-sm" placeholder="http://www.example.com/">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-6 pb-3">' +
                            '<label for="s_mobile_number_'+ s_ctr +'" class="form-label">Mobile Number <code>(numbers only)</code></label>' +
                            '<input type="number" id="s_mobile_number_'+ s_ctr +'" name="s_mobile_number_'+ s_ctr +'" class="form-control form-control-sm" min="0" placeholder="09XXXXXXXXX">' +
                            '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-6 pb-3">' +
                            '<label for="s_email_'+ s_ctr +'" class="form-label">Email Address <code>(janedoe@email.com)</code></label>' +
                            '<input type="email" id="s_email_'+ s_ctr +'" name="s_email_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter email address here">' +
                            '<div class="invalid-feedback">This field is required and please provide a valid email!</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row">' +
                        '<div class="col-md-4 pb-3">' +
                          '<label for="s_country_'+ s_ctr +'" class="form-label">Country </label>' +
                          '<select id="s_country_'+ s_ctr +'" name="s_country_'+ s_ctr +'" class="form-select form-select-sm">' +
                          '</select>' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 pb-3">' +
                          '<label for="s_province_'+ s_ctr +'" class="form-label">Province </label>' +
                          '<input type="text" id="s_province_'+ s_ctr +'" name="s_province_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter province here">' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 pb-3">' +
                          '<label for="s_city_'+ s_ctr +'" class="form-label">City </label>' +
                          '<input type="text" id="s_city_'+ s_ctr +'" name="s_city_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter city here">' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-8 pb-3">' +
                          '<label for="s_address_'+ s_ctr +'" class="form-label">Address </label>' +
                          '<input type="text" id="s_address_'+ s_ctr +'" name="s_address_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter address here">' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                        '<div class="col-md-4 pb-3">' +
                          '<label for="s_zip_code_'+ s_ctr +'" class="form-label">Zip Code </label>' +
                          '<input type="text" id="s_zip_code_'+ s_ctr +'" name="s_zip_code_'+ s_ctr +'" class="form-control form-control-sm" placeholder="Enter zip code here">' +
                          '<div class="invalid-feedback">This field is required!</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row pt-2">' +
                        '<div class="col-md-12"><button type="button" class="btn btn-danger rounded-pill px-4 waves-effect waves-light s-remove-tr"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 feather-sm ms-2 fill-white"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Remove</button></div>' +
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

    $("#ft_add").click(function () {
        document.getElementById('ft_ctr').value = ft_ctr++;
        $('#ft_ctr').val(ft_ctr);

        $("#ft_table").append('<tr>' +
            '<td> ' +
                '<div class="mb-3 pb-3 border-bottom">' +
                    '<div class="row">' +
                        '<div class="col-md-3">' +
                            '<div class="card pb-0">' +
                                '<div class="border-bottom p-1 bg-primary">' +
                                    '<div class="d-md-flex align-items-center">' +
                                        '<div class="mr-sm-2">' +
                                            '<h4 class="card-title p-1 m-1 text-light">TRANSACTION TYPE</h4>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="card-body">' +
                                    '<div class="row pb-3">' +
                                        '<div class="col-md-12">' +
                                            '<label for="ft_rgv_transaction_type_id_'+ ft_ctr +'" class="form-label">Transaction Type </label>' +
                                            '<select id="ft_rgv_transaction_type_id_'+ ft_ctr +'" name="ft_rgv_transaction_type_id_'+ ft_ctr +'" class="form-select form-select-sm" required>' +
                                            '</select>' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="row pb-3">' +
                                        '<div class="col-md-12">' +
                                            '<label for="ft_others_'+ ft_ctr +'" class="form-label">If others, please specify here <code id="ft_req_others_" hidden>*</code></label>' +
                                            '<input type="text" id="ft_others_'+ ft_ctr +'" name="ft_others_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter transaction type here">' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="row pb-3">' +
                                        '<div class="col-md-12">' +
                                            '<label for="ft_transaction_date_'+ ft_ctr +'" class="form-label">Date <code id="ft_req_transaction_date_" hidden>*</code></label>' +
                                            '<input type="date" id="ft_transaction_date_'+ ft_ctr +'" name="ft_transaction_date_'+ ft_ctr +'" class="form-control form-control-sm">' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="row pb-3">' +
                                        '<div class="col-md-12">' +
                                            '<label for="ft_is_sent_'+ ft_ctr +'" class="form-label">Is the money sent? </label>' +
                                            '<select id="ft_is_sent_'+ ft_ctr +'" name="ft_is_sent_'+ ft_ctr +'" class="form-select form-select-sm" required>' +
                                                '<option value="0">No</option>' +
                                                '<option value="1" selected>Yes</option>' +
                                            '</select>' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="row">' +
                                        '<div class="col-md-12">' +
                                            '<label for="ft_amount_'+ ft_ctr +'" class="form-label">Amount <code id="ft_req_amount_" hidden>*</code></label>' +
                                            '<input type="number" id="ft_amount_'+ ft_ctr +'" name="ft_amount_'+ ft_ctr +'" min="0" max="999999999" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" class="form-control form-control-sm" placeholder="0.00">' +
                                            '<div class="invalid-feedback">This field is required!</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-md-9">' +
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
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-12">' +
                                                    '<label for="ft_s_bank_name_'+ ft_ctr +'" class="form-label">Bank Name </label>' +
                                                    '<input type="text" id="ft_s_bank_name_'+ ft_ctr +'" name="ft_s_bank_name_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter bank name here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-6 pb-3">' +
                                                    '<label for="ft_s_account_name_'+ ft_ctr +'" class="form-label">Account Name </label>' +
                                                    '<input type="text" id="ft_s_account_name_'+ ft_ctr +'" name="ft_s_account_name_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter account name here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6">' +
                                                    '<label for="ft_s_account_no_'+ ft_ctr +'" class="form-label">Account No. </label>' +
                                                    '<input type="text" id="ft_s_account_no_'+ ft_ctr +'" name="ft_s_account_no_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter account no. here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-6 pb-3">' +
                                                    '<label for="ft_s_country_'+ ft_ctr +'" class="form-label">Country </label>' +
                                                    '<select id="ft_s_country_'+ ft_ctr +'" name="ft_s_country_'+ ft_ctr +'" class="form-control form-control-sm">' +
                                                    '</select>' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6">' +
                                                    '<label for="ft_s_province_'+ ft_ctr +'" class="form-label">Province </label>' +
                                                    '<input type="text" id="ft_s_province_'+ ft_ctr +'" name="ft_s_province_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter province here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-6 pb-3">' +
                                                    '<label for="ft_s_city_'+ ft_ctr +'" class="form-label">City </label>' +
                                                    '<input type="text" id="ft_s_city_'+ ft_ctr +'" name="ft_s_city_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter city here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6">' +
                                                    '<label for="ft_s_zip_code_'+ ft_ctr +'" class="form-label">Zip Code </label>' +
                                                    '<input type="text" id="ft_s_zip_code_'+ ft_ctr +'" name="ft_s_zip_code_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter zip code here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-12">' +
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
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-12">' +
                                                    '<label for="ft_r_bank_name_'+ ft_ctr +'" class="form-label">Bank Name </label>' +
                                                    '<input type="text" id="ft_r_bank_name_'+ ft_ctr +'" name="ft_r_bank_name_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter bank name here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-6 pb-3">' +
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
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-6 pb-3">' +
                                                    '<label for="ft_r_country_'+ ft_ctr +'" class="form-label">Country </label>' +
                                                    '<select id="ft_r_country_'+ ft_ctr +'" name="ft_r_country_'+ ft_ctr +'" class="form-control form-control-sm">' +
                                                    '</select>' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6">' +
                                                    '<label for="ft_r_province_'+ ft_ctr +'" class="form-label">Province </label>' +
                                                    '<input type="text" id="ft_r_province_'+ ft_ctr +'" name="ft_r_province_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter province here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-6 pb-3">' +
                                                    '<label for="ft_r_city_'+ ft_ctr +'" class="form-label">City </label>' +
                                                    '<input type="text" id="ft_r_city_'+ ft_ctr +'" name="ft_r_city_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter city here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                                '<div class="col-md-6">' +
                                                    '<label for="ft_r_zip_code_'+ ft_ctr +'" class="form-label">Zip Code </label>' +
                                                    '<input type="text" id="ft_r_zip_code_'+ ft_ctr +'" name="ft_r_zip_code_'+ ft_ctr +'" class="form-control form-control-sm" placeholder="Enter zip code here">' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row pb-3">' +
                                                '<div class="col-md-12">' +
                                                    '<label for="ft_r_address_'+ ft_ctr +'" class="form-label">Address </label>' +
                                                    '<textarea id="ft_r_address_'+ ft_ctr +'" name="ft_r_address_'+ ft_ctr +'" class="form-control form-control-sm" rows="2" placeholder="Enter address here"></textarea>' +
                                                    '<div class="invalid-feedback">This field is required!</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="row pt-2">' +
                            '<div class="col-md-12"><button type="button" class="btn btn-danger rounded-pill px-4 waves-effect waves-light ft-remove-tr"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 feather-sm ms-2 fill-white"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Remove</button></div>' +
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
                
                if (name == "Philippines") {
                    $(input).append("<option value='" + name + "' selected>" + name + "</option>");
                }
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


    $('#is_in_behalf_of_business').on('change', function (e) {
        e.preventDefault();

        isImpactingBusinessOperations();
    });

    function isImpactingBusinessOperations(){
        var is_in_behalf_of_business = $('#is_in_behalf_of_business').val();

        if (is_in_behalf_of_business == 0) {
            document.getElementById('req_business_name').hidden = true
            document.getElementById('business_name').required = false
            $("#business_name").attr('readonly', true);
            document.getElementById('is_impacting_business_operations').disabled = true
        } else {
            document.getElementById('req_business_name').hidden = false
            document.getElementById('business_name').required = true
            $("#business_name").attr('readonly', false);
            document.getElementById('is_impacting_business_operations').disabled = false
        }
    }

    // function onTransactionTypeChanged(ctr) {

    //     transaction_type_no_selected(ctr);
    //     //transaction_type_others(ctr, false);


    //     $('#ft_rgv_transaction_type_id_' + ctr).on('change', function (e) {
    //         e.preventDefault();
    //         var rgv_transaction_type_id = $(this).val();

    //         if (rgv_transaction_type_id == 0) {
    //             transaction_type_no_selected(ctr);
    //         } else if (rgv_transaction_type_id == 55) {
    //             transaction_type_others(ctr);
    //         } else {
    //             transaction_type_all(ctr);
    //         }
    //     });
    // }

    // function transaction_type_others(ctr) {
    //     fieldStatus('others', ctr, true, true, true);
    //     fieldStatus('transaction_date', ctr, true, true, true);
    //     fieldStatus('amount', ctr, true, true, true);
    //     fieldStatus('is_sent', ctr, true, false, true);
    //     fieldStatus('victim_bank_name', ctr, true, false, true);
    //     fieldStatus('victim_account_name', ctr, true, false, true);
    //     fieldStatus('victim_account_number', ctr, true, false, true);
    //     fieldStatus('victim_bank_country', ctr, true, false, true);
    //     fieldStatus('victim_bank_province_id', ctr, true, false, true);
    //     fieldStatus('victim_bank_city_id', ctr, true, false, true);
    //     fieldStatus('victim_bank_address', ctr, true, false, true);
    //     fieldStatus('victim_bank_zip_code', ctr, true, false, true);
    //     fieldStatus('receipient_bank_name', ctr, true, false, true);
    //     fieldStatus('receipient_account_name', ctr, true, false, true);
    //     fieldStatus('receipient_account_number', ctr, true, false, true);
    //     fieldStatus('receipient_bank_country', ctr, true, false, true);
    //     fieldStatus('receipient_bank_province_id', ctr, true, false, true);
    //     fieldStatus('receipient_bank_city_id', ctr, true, false, true);
    //     fieldStatus('receipient_bank_address', ctr, true, false, true);
    //     fieldStatus('receipient_bank_zip_code', ctr, true, false, true);
    // }

    // function transaction_type_no_selected(ctr) {
    //     fieldStatus('others', ctr, true, false, false);
    //     fieldStatus('transaction_date', ctr, true, false, false);
    //     fieldStatus('amount', ctr, true, false, false);
    //     fieldStatus('is_sent', ctr, true, false, false);
    //     fieldStatus('victim_bank_name', ctr, true, false, false);
    //     fieldStatus('victim_account_name', ctr, true, false, false);
    //     fieldStatus('victim_account_number', ctr, true, false, false);
    //     fieldStatus('victim_bank_country', ctr, true, false, false);
    //     fieldStatus('victim_bank_province_id', ctr, true, false, false);
    //     fieldStatus('victim_bank_city_id', ctr, true, false, false);
    //     fieldStatus('victim_bank_address', ctr, true, false, false);
    //     fieldStatus('victim_bank_zip_code', ctr, true, false, false);
    //     fieldStatus('receipient_bank_name', ctr, true, false, false);
    //     fieldStatus('receipient_account_name', ctr, true, false, false);
    //     fieldStatus('receipient_account_number', ctr, true, false, false);
    //     fieldStatus('receipient_bank_country', ctr, true, false, false);
    //     fieldStatus('receipient_bank_province_id', ctr, true, false, false);
    //     fieldStatus('receipient_bank_city_id', ctr, true, false, false);
    //     fieldStatus('receipient_bank_address', ctr, true, false, false);
    //     fieldStatus('receipient_bank_zip_code', ctr, true, false, false);
    // }

    // function transaction_type_all(ctr) {
    //     fieldStatus('others', ctr, true, false, false);
    //     fieldStatus('transaction_date', ctr, true, true, true);
    //     fieldStatus('amount', ctr, true, true, true);
    //     fieldStatus('is_sent', ctr, true, false, true);
    //     fieldStatus('victim_bank_name', ctr, true, false, true);
    //     fieldStatus('victim_account_name', ctr, true, false, true);
    //     fieldStatus('victim_account_number', ctr, true, false, true);
    //     fieldStatus('victim_bank_country', ctr, true, false, true);
    //     fieldStatus('victim_bank_province_id', ctr, true, false, true);
    //     fieldStatus('victim_bank_city_id', ctr, true, false, true);
    //     fieldStatus('victim_bank_address', ctr, true, false, true);
    //     fieldStatus('victim_bank_zip_code', ctr, true, false, true);
    //     fieldStatus('receipient_bank_name', ctr, true, false, true);
    //     fieldStatus('receipient_account_name', ctr, true, false, true);
    //     fieldStatus('receipient_account_number', ctr, true, false, true);
    //     fieldStatus('receipient_bank_country', ctr, true, false, true);
    //     fieldStatus('receipient_bank_province_id', ctr, true, false, true);
    //     fieldStatus('receipient_bank_city_id', ctr, true, false, true);
    //     fieldStatus('receipient_bank_address', ctr, true, false, true);
    //     fieldStatus('receipient_bank_zip_code', ctr, true, false, true);
    // }

    // function fieldStatus(field_name, ctr, viewFlag, requireFlag, enableFlag){
    //     if (viewFlag) {
    //         document.getElementById('ft_' + field_name + '_' + ctr).hidden = false;
    //     } else {
    //         document.getElementById('ft_' + field_name + '_' + ctr).hidden = true;
    //     }
    //     if (requireFlag) {
    //         document.getElementById('req_ft_' + field_name + '_' + ctr).hidden = false;
    //         document.getElementById('ft_' + field_name + '_' + ctr).classList.add("isRequired");
    //     } else {
    //         document.getElementById('req_ft_' + field_name + '_' + ctr).hidden = true;
    //         document.getElementById('ft_' + field_name + '_' + ctr).classList.remove("isRequired");
    //     }
    //     if (enableFlag) {
    //         if (field_name == "victim_bank_country" || field_name == "victim_bank_province_id" || field_name == "victim_bank_city_id" || field_name == "receipient_bank_country" || field_name == "receipient_bank_province_id" || field_name == "receipient_bank_city_id") {
    //             $('#ft_' + field_name + '_' + ctr).select2({ disabled: '' });
    //         } else {
    //             $('#ft_' + field_name + '_' + ctr).attr('readonly', false);
    //         }
    //         $('#ft_' + field_name + '_' + ctr).removeClass("is-read-only");
           
    //     } else {
    //         if (field_name == "victim_bank_country" || field_name == "victim_bank_province_id" || field_name == "victim_bank_city_id" || field_name == "receipient_bank_country" || field_name == "receipient_bank_province_id" || field_name == "receipient_bank_city_id") {
    //             $('#ft_' + field_name + '_' + ctr).select2({ disabled: 'readonly' });
    //         } else {
    //             $('#ft_' + field_name + '_' + ctr).attr('readonly', true);
    //         }
    //         $('#ft_' + field_name + '_' + ctr).addClass("is-read-only");
    //     }
    // }
});