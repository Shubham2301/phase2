/*! ColoredCow 2017-05-10 */

jQuery(document).ready(function() {
    console.log("in main.js");
    console.log(PARAMS.ajaxurl);
    // jQuery('#save_id').on('click', function() {
    //     addSubscriber();
    // });

    jQuery('#submit_field').on('click', function() {
        console.log("submit field clicked");
        RSVP();
    });

});


// function addSubscriber() {
//     var add_subscriber_form = jQuery('#add_subscriber_form');
//     if (!add_subscriber_form[0].checkValidity()) {
//         add_subscriber_form[0].reportValidity();
//         return;
//     }
//     console.log('clicked');
//     console.log(jQuery('#add_subscriber_form').serialize());
//     // return;
//     jQuery.ajax({
//         type: "POST",
//         url: PARAMS.ajaxurl,
//         data: add_subscriber_form.serialize(),
//         success: function(response) {
//             //var data = response.data;
//             console.log("ajax request successful");

//         }
//     });
// }


function RSVP() {
    console.log("click verify");
    var guest_email = jQuery('#guest_email');
    var value = jQuery("#guest_email").val();
    var dataString = 'email1 ' + value;
    if (!guest_email[0].checkValidity()) {
        guest_email[0].reportValidity();
    }
    console.log(dataString);
    jQuery.ajax({
        type: "POST",
        url: PARAMS.ajaxurl,
        data: dataString,
        success: function(response) {
            console.log(response);
            console.log("verifying with database");
        }
    });
    return;
}
