/*! ColoredCow 2017-05-10 */

jQuery(document).ready(function() {
    console.log("in main.js");

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
    console.log('clicked');
    console.log(jQuery('#add_subscriber_form').serialize());
    jQuery.ajax({
        type: "POST",
        url: PARAMS.ajaxurl,
        data: add_subscriber_form.serialize(),
        success: function(response) {
            console.log(response);
            if (response == 1) {
                window.alert("Congratulations!!! you have successfully registered for this event");
            } else if (response == 0) {
                window.alert("ERROR! these credentials are already registered");
            }

        }
    });
}

function RSVP() {
    console.log("click verify");
    var verification_form = jQuery('#verification_form');
    var email1 = jQuery("#guest_email").val();
    console.log(email1);
    //var dataString = verification_form.serialize();
    if (!verification_form[0].checkValidity()) {
        verification_form[0].reportValidity();
        return;
    }
    var dataString = {
        'action': 'verify_field',
        'value': email1
    }
    console.log(PARAMS.ajaxurl);
    //console.log(dataString);
    jQuery.ajax({
        type: "POST",
        url: PARAMS.ajaxurl,
        data: dataString,
        success: function(response) {
            if (response.match(/success/gi)) {
                window.alert("your response has been accepted");
            } else {
                window.alert("sorry no entry found with this credentials");
            }
        }
    });

}
