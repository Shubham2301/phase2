/*! ColoredCow 2017-05-30 */
function addSubscriber(){var a=jQuery("#add_subscriber_form");return a[0].checkValidity()?void jQuery.ajax({type:"POST",url:PARAMS.ajaxurl,data:a.serialize(),success:function(a){a.success?window.alert("Congratulations!!! you have successfully registered for this event"):window.alert("ERROR! these credentials are already registered")}}):void a[0].reportValidity()}function RSVP(){var a=jQuery("#verification_form"),b=a.serialize();return a[0].checkValidity()?void jQuery.ajax({type:"POST",url:PARAMS.ajaxurl,data:b,success:function(a){a.success?window.alert("your response has been accepted"):"duplicate"==a.data?window.alert("your have already registered your response"):window.alert("sorry !!! credential mis-match or you are not registered in our list")},error:function(){window.alert("some error occured!! contact the administrator")}}):void a[0].reportValidity()}jQuery(document).ready(function(){jQuery("#save_id").on("click",function(){addSubscriber()}),jQuery("#submit_field").on("click",function(){RSVP()})});