/*! ColoredCow 2017-05-10 */

jQuery(document).ready(function() {
    jQuery('#save_id').on('click', function() {
        addSubscriber();
    });

    jQuery('#submit_field').on('click', function() {
        console.log("submit field clicked");
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
            console.log('add subscriber response' + response);
            if (response == 1) {
                window.alert("Congratulations!!! you have successfully registered for this event");
            } else if (response == 0) {
                window.alert("ERROR! these credentials are already registered");
            }
        }
    });
}

function RSVP() {
    var verification_form = jQuery('#verification_form');
    var dataString = verification_form.serialize();
    console.log(dataString);
    console.log(PARAMS.ajaxurl);
    if (!verification_form[0].checkValidity()) {
        verification_form[0].reportValidity();
        return;
    }
    jQuery.ajax({
        type: "POST",
        url: PARAMS.ajaxurl,
        data: dataString,
        success: function(response) {
            console.log(response);
            if (response.match(/success/gi)) {
                window.alert("your response has been accepted");
            } else if (response.match(/duplicate/gi)) {
                window.alert("your have already registered your response");
            } else {
                window.alert("sorry no entry found with this credentials");
            }
        },
        error: function() {
            console.log("ajax failed");
        }
    });
}
