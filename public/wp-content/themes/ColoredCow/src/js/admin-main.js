    jQuery(document).ready(function() {
        // console.log("abcd");
        update_guests_table();
        // console.log("in admin-main");
        jQuery('#soiree-form-submit').on('click', function() {
            console.log("button clicked");
            update_guests_table();
        });

        function update_guests_table() {
            console.log("updateGuestTable");
            jQuery.ajax({
                url: PARAMS.ajaxurl,
                data: jQuery('#event_form_data').serialize(),
                method: 'POST',
                success: function(res) {
                    console.log(res);
                    jQuery('#event_users_table tbody').html(res);
                }
            });
        }
        jQuery('.event_users_table').on('click', '.btn-change-status', function() {
            var parent_form = jQuery(this).closest('form');
            if (jQuery(this).hasClass('confirm')) {
                update_status(parent_form, 'confirmed');
            } else if (jQuery(this).hasClass('decline')) {
                update_status(parent_form, 'declined');
            }
        });

        function update_status(parent_form, change_to_status) {
            var form_data = parent_form.serialize() + '&change_to_status=' + change_to_status;
            jQuery.ajax({
                url: PARAMS.ajaxurl,
                data: form_data,
                method: 'POST',
                success: function(res) {
                    jQuery('#event_users_table tbody').html(res);
                },
                error: function(request, status, error) {
                    console.log(error);
                }
            });
        }
    });
