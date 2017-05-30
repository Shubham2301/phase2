/*! ColoredCow 2017-05-29 */
function RSVP() { console.log("click verify");
    var a = jQuery("#verification_form"),
        b = a.serialize();
    console.log("dataString= " + b);
    var c = jQuery("#guest_email").val();
    return console.log(c), a[0].checkValidity() ? void jQuery.ajax({ type: "POST", url: PARAMS.ajaxurl, data: b, success: function(a) { a.match(/success/gi) ? window.alert("your response has been accepted") : window.alert("sorry no entry found with this credentials") } }) : void a[0].reportValidity() }
jQuery(document).ready(function() { jQuery("#submit_field").on("click", function() { RSVP() }) });
