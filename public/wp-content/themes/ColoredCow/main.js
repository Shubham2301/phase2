/*! ColoredCow 2017-05-22 */
function addSubscriber(){var a=jQuery("#add_subscriber_form");return a[0].checkValidity()?(console.log("clicked"),console.log(jQuery("#add_subscriber_form").serialize()),void jQuery.ajax({type:"POST",url:PARAMS.ajaxurl,data:a.serialize(),success:function(a){console.log("ajax request successful")}})):void a[0].reportValidity()}function RSVP(){console.log("click verify");var a=jQuery("#verification_form"),b=jQuery("#guest_email").val();if(console.log(b),!a[0].checkValidity())return void a[0].reportValidity();var c={action:"verify_field",value:b};console.log(PARAMS.ajaxurl),jQuery.ajax({type:"POST",url:PARAMS.ajaxurl,data:c,success:function(a){a.match(/success/gi)?window.alert("your response has been accepted"):window.alert("sorry no entry found with this credentials")}})}jQuery(document).ready(function(){console.log("in main.js"),jQuery("#save_id").on("click",function(){addSubscriber()}),jQuery("#submit_field").on("click",function(){console.log("submit field clicked"),RSVP()})});