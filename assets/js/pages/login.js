
$(document).ready(function(){

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

        var formData = new FormData(form);

        $.ajax({
            url: base_url + "Auth/login",
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
                    window.location = base_url + "Dashboard";
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
});