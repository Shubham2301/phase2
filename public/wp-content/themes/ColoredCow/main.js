/*! ColoredCow 2017-06-13 */
function addSubscriber(){var a=jQuery("#add_subscriber_form");return a[0].checkValidity()?void jQuery.ajax({type:"POST",url:PARAMS.ajaxurl,data:a.serialize(),success:function(a){a.success?showRegisterSuccessAlert():showRegisterDuplicateAlert()}}):void a[0].reportValidity()}function RSVP(){var a=jQuery("#verification_form"),b=a.serialize();return a[0].checkValidity()?void jQuery.ajax({type:"POST",url:PARAMS.ajaxurl,data:b,success:function(a){a.success?showRSVPSuccessAlert():"duplicate"==a.data?showRSVPDuplicateAlert():showRSVPErrorAlert()},error:function(a,b,c){console.log(c)}}):void a[0].reportValidity()}function showRegisterSuccessAlert(){jQuery("#register-response-text").removeClass("alert-warning").addClass("in alert-success text-center").html("<strong>Congratulations!!</strong>You have successfully registered to our guest list.")}function showRegisterDuplicateAlert(){jQuery("#register-response-text").removeClass("alert-success").addClass("in alert-warning text-center").html("<strong>Oops!!!</strong>Are you sure you are new here?? These credentials are already registered.")}function showRSVPSuccessAlert(){jQuery("#rsvp-response-text").removeClass("alert-warning alert-danger").addClass("in alert-success").html("<strong>Congratulations!!</strong> we will be expecting you")}function showRSVPDuplicateAlert(){jQuery("#rsvp-response-text").removeClass("alert-success alert-danger").addClass("in alert-warning").html("<strong>Oops!!!</strong> I think you have you have already registered your response")}function showRSVPErrorAlert(){jQuery("#rsvp-response-text").removeClass("alert-success alert-warning").addClass("in alert-danger").html("<strong>Oops!!!</strong> your credentials are not matching")}jQuery(document).ready(function(){jQuery("#save_id").on("click",function(){addSubscriber()}),jQuery("#submit_field").on("click",function(){RSVP()})});