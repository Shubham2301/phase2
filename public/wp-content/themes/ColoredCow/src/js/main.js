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
                window.alert("Congratulations!!! you have successfully registered for this event");
            } else {
                window.alert("ERROR! these credentials are already registered");
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
            if (response.match(/success/gi)) {
                window.alert("your response has been accepted");
            } else if (response.match(/duplicate/gi)) {
                window.alert("your have already registered your response");
            } else {
                window.alert("sorry !!! credential mis-match or you are not registered in our list");
            }
        },
        error: function() {
            window.alert("some error occured!! contact the administrator");
        }
    });
}
