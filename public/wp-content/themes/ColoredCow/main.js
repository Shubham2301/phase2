/*! ColoredCow 2017-05-19 */
function RSVP(){console.log("click verify");var a=jQuery("#guest_email"),b=jQuery("#guest_email").val(),c="email1 "+b;a[0].checkValidity()||a[0].reportValidity(),console.log(c),jQuery.ajax({type:"POST",url:PARAMS.ajaxurl,data:c,success:function(a){console.log(a),console.log("verifying with database")}})}jQuery(document).ready(function(){console.log("in main.js"),console.log(PARAMS.ajaxurl),jQuery("#submit_field").on("click",function(){console.log("submit field clicked"),RSVP()})});