var FormValidation = function () {

    // validation using icons
    var newJobrequest = function () {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form = $('#form_sample_2');
        var error2 = $('.alert-danger', form);
        var success2 = $('.alert-success', form);

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                text: {
                    required: true
                },
                service_types: {
                    required: true
                },
                duration: {
                    required: true
                },
                budget: {
                    required: true,
                    number: true
                },
                date: {
                    required: true
                },
                userfile: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "job field is required",
                    minlength: "atleast 2 character"
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass("has-error").addClass('has-success'); // set error class to the control group
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form) {
                //success2.show();
                error2.hide();
                //form[0].submit(); // submit the form
                var formData = new FormData($(form)[0]);

                $.ajax({
                    url: "request_submitted",
                    type: "POST",
                    data: formData,
                    async: false,
                    success: function (j) {
                        var job = $.parseJSON(j);
                        if (job.jobs) {
                            UIToastr.initDefaultSuccessToaster('Success', 'Job quotation Sent!');
                            setTimeout(
                                function()
                                {}, 5000);
                            window.location.href='pending_request';
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });
        $('.select2me', form).change(function () {
            form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });
        $('#duration', form).change(function () {
            form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });


    };
    var job_status = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form2 = $('#job_status');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                text: {
                    required: true
                },
                userfile: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass("has-error").addClass('has-success'); // set error class to the control group
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form2) {
                //success2.show();
                error2.hide();
                //form[0].submit(); // submit the form
                var formData = new FormData($(form2)[0]);

                $.ajax({
                    url: "submit_status",
                    type: "POST",
                    data: formData,
                    async: false,
                    success: function (state) {
                        var stat = $.parseJSON(state);
                        if (stat.element) {
                            UIToastr.initDefaultSuccessToaster('Success', 'Job Status Sent!');
                            $('#job_status')[0].reset();
                            var element = '#job_status :input';
                            var icon = $(element).parent('.input-icon').children('i');
                            $(element).closest('.form-group').removeClass('has-success'); // set success class to the control group
                            icon.removeClass("fa-check");


                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });


    };
    var revision = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form3 = $('#revision');
        var error2 = $('.alert-danger', form3);
        var success2 = $('.alert-success', form3);

        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                text: {
                    required: true
                },
                userfile: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass("has-error").addClass('has-success'); // set error class to the control group
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form3) {
                //success2.show();
                error2.hide();
                //form[0].submit(); // submit the form
                var formData = new FormData($(form3)[0]);

                $.ajax({
                    url: "revision",
                    type: "POST",
                    data: formData,
                    async: false,
                    success: function (r) {
                        var resp = $.parseJSON(r);
                        if (resp.rev) {
                            UIToastr.initDefaultSuccessToaster('Success', 'Request submitted!');
                            $('#revision')[0].reset();
                            var element = '#revision :input';
                            var icon = $(element).parent('.input-icon').children('i');
                            $(element).closest('.form-group').removeClass('has-success'); // set success class to the control group
                            icon.removeClass("fa-check");
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });


    };
    var contact = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form4 = $('#contact');
        var error2 = $('.alert-danger', form4);
        var success2 = $('.alert-success', form4);

        form4.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                description: {
                    required: true
                },
                category: {
                    required: true
                },
                subject: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "job field is required",
                    minlength: "atleast 2 character"
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass("has-error").addClass('has-success'); // set error class to the control group
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form4) {
                console.log('mental');
                //success2.show();
                error2.hide();
                //form[0].submit(); // submit the form
                var formData = new FormData($(form4)[0]);

                $.ajax({
                    url: "new_ticket",
                    type: "POST",
                    data: formData,
                    async: false,
                    success: function (nT) {
                        var tik = $.parseJSON(nT);
                        if (tik.ticket) {
                            UIToastr.initDefaultSuccessToaster('Success', 'Ticket submitted!');
                            $('#contact')[0].reset();
                            var element = '#contact :input';
                            var icon = $(element).parent('.input-icon').children('i');
                            $(element).closest('.form-group').removeClass('has-success'); // set success class to the control group
                            icon.removeClass("fa-check");
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });
        $('.select2me', form4).change(function () {
            form4.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });


    };
    var fund = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        /*var amount = '';
        $("#taka").on("change paste keyup", function() {
            var main_amount = $('#taka').val() * 5/100;
            var taka = $('#taka').val() - main_amount;
            $('#main_taka').val(taka);
            amount = taka;
        });*/

        var fund = $('#fund');
        var error2 = $('.alert-danger', fund);
        var success2 = $('.alert-success', fund);

        fund.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                subject: {
                    required: true
                },
                description: {
                    required: true
                },
                p_method: {
                    required: true
                },
                amount: {
                    required: true,
                    number:true
                }
            },

            messages: {
                name: {
                    required: "job field is required",
                    minlength: "atleast 2 character"
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass("has-error").addClass('has-success'); // set error class to the control group
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (fund) {
                //success2.show();
                error2.hide();
                //form[0].submit(); // submit the form
                var formData = new FormData($(fund)[0]);

                $.ajax({
                    url: "fund_request",
                    type: "POST",
                    data: formData,
                    async: false,
                    success: function (nT) {
                        var tik = $.parseJSON(nT);
                        if (tik.fund_data) {
                            UIToastr.initDefaultSuccessToaster('Success', 'Request submitted!');
                            window.setTimeout(function(){location.reload()},1000)
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });
        $('.select2me', fund).change(function () {
            fund.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });


    };
    var approve_fund = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        /*var amount = '';
        $("#taka").on("change paste keyup", function() {
            var main_amount = $('#taka').val() * 5/100;
            var taka = $('#taka').val() - main_amount;
            $('#main_taka').val(taka);
            amount = taka;
        });*/

        var approve_fund = $('#approve_fund');
        var error2 = $('.alert-danger', approve_fund);
        var success2 = $('.alert-success', approve_fund);

        approve_fund.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                amount: {
                    required: true,
                    number:true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass("has-error").addClass('has-success'); // set error class to the control group
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (fund) {
                //success2.show();
                error2.hide();
                //form[0].submit(); // submit the form
                var formData = new FormData($(approve_fund)[0]);

                $.ajax({
                    url: "accStatus",
                    type: "POST",
                    data: formData,
                    async: false,
                    success: function (nT) {
                        var tik = $.parseJSON(nT);
                        if (tik.status) {
                            UIToastr.initDefaultSuccessToaster('Success', 'Request approved!');
                            window.setTimeout(function(){location.reload()},1000)
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });


    };
    var adjustment_form = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation
        /*var amount = '';
        $("#taka").on("change paste keyup", function() {
            var main_amount = $('#taka').val() * 5/100;
            var taka = $('#taka').val() - main_amount;
            $('#main_taka').val(taka);
            amount = taka;
        });*/

        var adjustment_form = $('#adjustment_form');
        var error2 = $('.alert-danger', adjustment_form);
        var success2 = $('.alert-success', adjustment_form);

        adjustment_form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                subject: {
                    required: true
                },
                amount: {
                    required: true,
                    number:true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass("has-error").addClass('has-success'); // set error class to the control group
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (fund) {
                //success2.show();
                error2.hide();
                //form[0].submit(); // submit the form
                var formData = new FormData($(adjustment_form)[0]);

                $.ajax({
                    url: "adjustment_submit",
                    type: "POST",
                    data: formData,
                    async: false,
                    success: function (nT) {
                        var tik = $.parseJSON(nT);
                        if (tik.status) {
                            UIToastr.initDefaultSuccessToaster('Success', 'Submitted!');
                            window.setTimeout(function(){location.reload()},1000)
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });
        $('.select2me', adjustment_form).change(function () {
            adjustment_form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

    };
    var service_type = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form4 = $('#service_type_input');
        var error2 = $('.alert-danger', form4);
        var success2 = $('.alert-success', form4);

        form4.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                service: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "job field is required",
                    minlength: "atleast 2 character"
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass("has-error").addClass('has-success'); // set error class to the control group
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form4) {
                success2.show();
                error2.hide();
                //form[0].submit(); // submit the form
                var formData = new FormData($(form4)[0]);

                $.ajax({
                    url: "service_type_input",
                    type: "POST",
                    data: formData,
                    async: false,
                    success: function (pp) {
                        var res = $.parseJSON(pp);
                        if (res.serv) {

                            UIToastr.initDefaultSuccessToaster('Success', 'Service Type Added');
                            $('#service_type_input')[0].reset();
                            var element = '#service_type_input :input';
                            var icon = $(element).parent('.input-icon').children('i');
                            $(element).closest('.form-group').removeClass('has-success'); // set success class to the control group
                            icon.removeClass("fa-check");
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });


    };
    var feedback = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var form5 = $('#feedback');
        var error2 = $('.alert-danger', form5);
        var success2 = $('.alert-success', form5);

        form5.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                star: {
                    required: true
                },
                comment: {
                    required: true
                }
            },

            messages: {
                name: {
                    required: "job field is required",
                    minlength: "atleast 2 character"
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass("has-error").addClass('has-success'); // set error class to the control group
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function (form5) {
                success2.show();
                error2.hide();
                //form[0].submit(); // submit the form
                var formData = new FormData($(form5)[0]);

                $.ajax({
                    url: "feedback",
                    type: "POST",
                    data: formData,
                    async: false,
                    success: function (feed) {
                        var res = $.parseJSON(feed);
                        if (res.fed) {
                            UIToastr.initDefaultSuccessToaster('Success', 'Service Type Added');
                            $('#feedback')[0].reset();
                            var element = '#feedback :input';
                            var icon = $(element).parent('.input-icon').children('i');
                            $(element).closest('.form-group').removeClass('has-success'); // set success class to the control group
                            icon.removeClass("fa-check");
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });


    };

    return {
        //main function to initiate the module
        init: function () {
            newJobrequest();
            job_status();
            revision();
            contact();
            feedback();
            service_type();
            fund();
            approve_fund();
            adjustment_form();

        }

    };

}();

jQuery(document).ready(function () {
    FormValidation.init();
});