<?php 

if ( ! function_exists( 'cc_scripts' ) ) {
    function cc_scripts() {
        wp_enqueue_script('cc-bootstrap', get_template_directory_uri().'/dist/lib/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('main', get_template_directory_uri().'/main.js', array('jquery', 'cc-bootstrap'), '1.0.0', true);
        wp_localize_script( 'main', 'PARAMS', array('ajaxurl' => admin_url('admin-ajax.php')) );

    }
    add_action('wp_enqueue_scripts','cc_scripts');
}

if ( ! function_exists( 'cc_styles' ) ) {
    function cc_styles() {  
        wp_enqueue_style('cc-bootstrap', get_template_directory_uri().'/dist/lib/css/bootstrap.min.css');
        wp_enqueue_style('style', get_template_directory_uri().'/style.css');

    }
    add_action('wp_enqueue_scripts','cc_styles');
}

//add filter to remove margin above html
add_filter('show_admin_bar','__return_false');

// function add_subscriber()
// {
//     $post_title = $_POST['name'];
//     $post_phone = $_POST['phone'];
//     $post_email = $_POST['email'];
//     $my_post = array(
//       'post_title'    => $post_title,
//       'post_phone'    => $post_phone,
//       'post_status'   => 'publish',
//       'post_type'     => 'guest'
//      );
    
 
// // Insert the post into the database
//     $post_id = wp_insert_post( $my_post );
//     if('$post_id')
//     {
//         add_post_meta($post_id, 'phone', $post_phone);
//         add_post_meta($post_id, 'email', $post_email);
//     }

// }

// add_action('wp_ajax_add_subscriber', 'add_subscriber');
// add_action('wp_ajax_nopriv_add_subscriber', 'add_subscriber');

function verify_field()
{
    global $wpdb;
    $tablename = $wpdb->prefix."soiree";
    $post_verify_email = sanitize_email($_POST['guest_email']);
    $datum = $wpdb->get_results("SELECT * FROM 23_sjpostmeta WHERE meta_value = '".'s@j.com'."'");
    if($datum>0)
    {
        echo "email matched";
    }
    else
    {
        echo "Email not found";
    }
    return true;
    //return json_encode($datum);
}    
