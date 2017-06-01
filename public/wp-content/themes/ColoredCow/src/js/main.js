jQuery(document).ready(function() {
    jQuery('#save_id').on('click', function() {
        addSubscriber();
    });
    jQuery('#submit_field').on('click', function() {
        RSVP();
    });
});

function addSubscriber() {
    var add_subscriber_form = jQuery('#add_subscriber_form');
    if (!add_subscriber_form[0].checkValidity()) {
        add_subscriber_form[0].reportValidity();
        return;
    }
    jQuery.ajax({
        type: "POST",
        url: PARAMS.ajaxurl,
        data: add_subscriber_form.serialize(),
        success: function(response) {
            if (response.success) {
                showRegisterSuccessAlert();
            } else {
                showRegisterDuplicateAlert()
            }
        }
    });
}

function RSVP() {
    var verification_form = jQuery('#verification_form');
    var dataString = verification_form.serialize();
    if (!verification_form[0].checkValidity()) {
        verification_form[0].reportValidity();
        return;
    }
    jQuery.ajax({
        type: "POST",
        url: PARAMS.ajaxurl,
        data: dataString,
        success: function(response) {
            if (response.success) {
                showRSVPSuccessAlert()
            } else if (response.data == "duplicate") {
                showRSVPDuplicateAlert()
            } else {
                showRSVPErrorAlert()
            }
        },
        error: function() {
            window.alert("some error occured!! contact the administrator");
        }
    });
}

function showRegisterSuccessAlert() {
    jQuery('#register-response-text')
        .removeClass('alert-warning')
        .addClass('in alert-success text-center')
        .html('<strong>Congratulations!!</strong>You have successfully registered to our guest list.');
}

function showRegisterDuplicateAlert() {
    jQuery('#register-response-text')
        .removeClass('alert-success')
        .addClass('in alert-warning text-center')
        .html('<strong>Oops!!!</strong>Are you sure you are new here?? These credentials are already registered.');
}

function showRSVPSuccessAlert() {
    jQuery('#rsvp-response-text')
        .removeClass('alert-warning alert-danger')
        .addClass('in alert-success')
        .html('<strong>Congratulations!!</strong> we will be expecting you');
}

function showRSVPDuplicateAlert() {
    jQuery('#rsvp-response-text')
        .removeClass('alert-success alert-danger')
        .addClass('in alert-warning')
        .html('<strong>Oops!!!</strong> I think you have you have already registered your response');
}

function showRSVPErrorAlert() {
    jQuery('#rsvp-response-text')
        .removeClass('alert-success alert-warning')
        .addClass('in alert-danger')
        .html('<strong>Oops!!!</strong> your credentials are not matching');
}
