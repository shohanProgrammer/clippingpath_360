var SweetAlert = function () {
	var acceptRequest = function () {
        $('.mt-sweetalert').each(function () {
            var sa_title = $(this).data('title');
            var sa_message = $(this).data('message');
            var sa_type = $(this).data('type');
            var sa_allowOutsideClick = $(this).data('allow-outside-click');
            var sa_showConfirmButton = $(this).data('show-confirm-button');
            var sa_showCancelButton = $(this).data('show-cancel-button');
            var sa_closeOnConfirm = $(this).data('close-on-confirm');
            var sa_closeOnCancel = $(this).data('close-on-cancel');
            var sa_confirmButtonText = $(this).data('confirm-button-text');
            var sa_cancelButtonText = $(this).data('cancel-button-text');
            var sa_popupTitleSuccess = $(this).data('popup-title-success');
            var sa_popupMessageSuccess = $(this).data('popup-message-success');
            var sa_popupTitleCancel = $(this).data('popup-title-cancel');
            var sa_popupMessageCancel = $(this).data('popup-message-cancel');
            var sa_confirmButtonClass = $(this).data('confirm-button-class');
            var sa_cancelButtonClass = $(this).data('cancel-button-class');

            $('.accept-sweet').click(function(){
                //console.log(sa_btnClass);
                swal({
                        title: "Do you want to accept this project?",
                        text: "click yes to confirm",
                        type: 'info',
                        allowOutsideClick: true,
                        showConfirmButton: true,
                        showCancelButton: true,
                        confirmButtonClass: 'btn-success',
                        cancelButtonClass: 'btn-default',
                        closeOnConfirm: false,
                        closeOnCancel: true,
                        confirmButtonText: 'Yes, I accept',
                        cancelButtonText: 'Close'
                    },
                    function(isConfirm){
                        if (isConfirm){
                            $.ajax({
                                url: "upStatus",
                                type: 'POST',
                                data: $('form').serialize(),
                                dataType: 'json',
                                success: function (resp) {
                                    if (resp.status == true){
                                        swal({title:'Accepted', text:'You have accepted the project', type:"success"},function() {
                                                window.location = 'ongoing';
                                            }

                                        )
                                    }
                                }
                            });
                        } else {
                        }
                    });
            });$('.delete_sweet').click(function(){
                //console.log(sa_btnClass);
                swal({
                        title: "Do you want to delete this service type?",
                        text: "click yes to confirm",
                        type: 'info',
                        allowOutsideClick: true,
                        showConfirmButton: true,
                        showCancelButton: true,
                        confirmButtonClass: 'btn-success',
                        cancelButtonClass: 'btn-default',
                        closeOnConfirm: false,
                        closeOnCancel: true,
                        confirmButtonText: 'Yes, Delete',
                        cancelButtonText: 'Close'
                    },
                    function(isConfirm){
                        if (isConfirm){
                            $.ajax({
                                url: "delete_service",
                                type: 'POST',
                                data: $('form').serialize(),
                                dataType: 'json',
                                success: function (respo) {
                                    if (respo.delete == true){
                                        swal({title:'Deleted', text:'Service type deleted', type:"success"},function() {
                                                window.location = 'service_type';
                                            }

                                        )
                                    }
                                }
                            });
                        } else {
                        }
                    });
            });
            $('.solved-sweet').click(function(){
                swal({
                        title: "Do you want to mark the ticket as solved?",
                        text: "click yes to confirm",
                        type: 'info',
                        allowOutsideClick: true,
                        showConfirmButton: true,
                        showCancelButton: true,
                        confirmButtonClass: 'btn-success',
                        cancelButtonClass: 'btn-default',
                        closeOnConfirm: false,
                        closeOnCancel: true,
                        confirmButtonText: 'Yes, Ticket solved',
                        cancelButtonText: 'Close'
                    },
                    function(isConfirm){
                        if (isConfirm){
                            $.ajax({
                                url: "ticket_solved",
                                type: 'POST',
                                data: $('form').serialize(),
                                dataType: 'json',
                                success: function (resp) {
                                    if (resp.status == true){
                                        swal({title:'Solved!', text:'Ticket solved!', type:"success"},function() {
                                                window.location = 'all_tickets';
                                            }

                                        )
                                    }
                                }
                            });
                        } else {
                        }
                    });
            });
            $('.req-for-complete').click(function(){
                //console.log(sa_btnClass);
                swal({
                        title: "Do you want to mark the job as complete?",
                        type: 'info',
                        allowOutsideClick: true,
                        showConfirmButton: true,
                        showCancelButton: true,
                        confirmButtonClass: 'btn-success',
                        cancelButtonClass: 'btn-default',
                        closeOnConfirm: false,
                        closeOnCancel: true,
                        confirmButtonText: 'Request for approval',
                        cancelButtonText: 'Close'
                    },
                    function(isConfirm){
                        if (isConfirm){
                            $.ajax({
                                url: "reqComplete",
                                type: 'POST',
                                data: $('form').serialize(),
                                dataType: 'json',
                                success: function (resp) {
                                    if (resp.status == true){
                                        swal({title:'Success', text:'Request has been sent', type:"success"},function() {
                                                window.location = 'ongoing';
                                            }

                                        )
                                    }
                                }
                            });
                        } else {
                        }
                    });
            });
            $('.reject-sweet').click(function(){
                //console.log(sa_btnClass);
                swal({
                        title: sa_title,
                        text: sa_message,
                        type: sa_type,
                        allowOutsideClick: true,
                        showConfirmButton: sa_showConfirmButton,
                        showCancelButton: sa_showCancelButton,
                        confirmButtonClass: sa_confirmButtonClass,
                        cancelButtonClass: sa_cancelButtonClass,
                        closeOnConfirm: sa_closeOnConfirm,
                        closeOnCancel: sa_closeOnCancel,
                        confirmButtonText: sa_confirmButtonText,
                        cancelButtonText: sa_cancelButtonText
                    },
                    function(isConfirm){
                        if (isConfirm){
                            $.ajax({
                                url: "rejStatus",
                                type: 'POST',
                                data: $('form').serialize(),
                                dataType: 'json',
                                success: function (resp) {
                                    if (resp.status == true){
                                        swal({title:sa_popupTitleSuccess, text:sa_popupMessageCancel, type:"error"},function() {
                                                window.location = 'rejected';
                                            }

                                        )
                                    }
                                }
                            });
                        } else {
                        }
                    });
            });
            $('.reject-fund').click(function(){
                console.log('fff');
                swal({
                        title: sa_title,
                        text: sa_message,
                        type: sa_type,
                        allowOutsideClick: true,
                        showConfirmButton: sa_showConfirmButton,
                        showCancelButton: sa_showCancelButton,
                        confirmButtonClass: sa_confirmButtonClass,
                        cancelButtonClass: sa_cancelButtonClass,
                        closeOnConfirm: sa_closeOnConfirm,
                        closeOnCancel: sa_closeOnCancel,
                        confirmButtonText: sa_confirmButtonText,
                        cancelButtonText: sa_cancelButtonText
                    },
                    function(isConfirm){
                        if (isConfirm){
                            $.ajax({
                                url: "rej_fundStatus",
                                type: 'POST',
                                data: $('form').serialize(),
                                dataType: 'json',
                                success: function (resp) {
                                    if (resp.status == true){
                                        swal({title:sa_popupTitleSuccess, text:sa_popupMessageCancel, type:"error"},function() {
                                            window.setTimeout(function(){location.reload()},1000);
                                            }

                                        )
                                    }
                                }
                            });
                        } else {
                        }
                    });
            });
            $('.pay-now').click(function(){
                var amount = $('#client_balance').val();
                var job_budget = $(this).closest('.pending_project_row').find('.job_budget').val();
                var job_id = $(this).closest('.pending_project_row').find('.job_id').val();
                //console.log(amount);
                swal({
                        title: sa_title,
                        text: sa_message,
                        type: sa_type,
                        allowOutsideClick: true,
                        showConfirmButton: sa_showConfirmButton,
                        showCancelButton: sa_showCancelButton,
                        confirmButtonClass: sa_confirmButtonClass,
                        cancelButtonClass: sa_cancelButtonClass,
                        closeOnConfirm: sa_closeOnConfirm,
                        closeOnCancel: sa_closeOnCancel,
                        confirmButtonText: sa_confirmButtonText,
                        cancelButtonText: sa_cancelButtonText
                    },
                    function(isConfirm){
                        if (isConfirm){
                            var formData = new FormData();
                            formData.append('amount', amount);
                            formData.append('job_budget', job_budget);
                            formData.append('job_id', job_id);
                            //console.log(formData);
                            $.ajax({
                                url: "pay_now",
                                type: 'POST',
                                data: formData,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                success: function (r) {
                                    if (r.item == true){
                                        swal({title:sa_popupTitleSuccess, text:sa_popupMessageCancel, type:"success"},function() {
                                                window.setTimeout(function(){location.reload()},1000);
                                            }

                                        )
                                    }
                                }
                            });
                        } else {
                        }
                    });
            });
        });

    }



    return {
        //main function to initiate the module
        init: function () {
        	acceptRequest();
        	//rejectRequest();
        }
    }

}();


jQuery(document).ready(function() {
    SweetAlert.init();
});
