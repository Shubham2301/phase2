<?php 

if ( ! function_exists( 'cc_scripts' ) ) {
    function cc_scripts() {
        wp_enqueue_script('cc-bootstrap', get_template_directory_uri().'/dist/lib/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('main', get_template_directory_uri().'/main.js', array('jquery', 'cc-bootstrap'), '1.1.0', true);
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

function add_subscriber()
{
    $post_title = $_POST['name'];
    $post_phone = $_POST['phone'];
    $post_email = $_POST['email'];
    $post_password= $_POST['password'];
    $post_gender= $_POST['gender'];
    $hash = wp_hash_password( $post_password );
    if(check_duplicate_entry($post_phone,$post_email)==true)
        {
        $my_post = array(
          'post_title'    => $post_title,
          'post_status'   => 'publish',
          'post_type'     => 'guest'
         ); 
        // Insert the post into the database
        $post_id = wp_insert_post( $my_post );
        if('$post_id')
        {
            add_post_meta($post_id, 'phone', $post_phone);
            add_post_meta($post_id, 'email', $post_email);
            add_post_meta($post_id, 'password', $hash);
            //add_post_meta($post_id, 'gender', $post_gender);
        }
        wp_die(1);
    }
    else
    {
        wp_die(0);
    }
}

add_action('wp_ajax_add_subscriber', 'add_subscriber');
add_action('wp_ajax_nopriv_add_subscriber', 'add_subscriber');


function verify_field2()
{
    global $wpdb;
    $password = $_POST['password'];
    $postID = $wpdb->get_var("SELECT post_id FROM 23_sjpostmeta WHERE meta_value = '".$_POST['guest_email']."'");
    $hash=$wpdb->get_var("SELECT meta_value FROM 23_sjpostmeta WHERE post_id = '".$postID."'AND meta_key = 'password'");
    if( wp_check_password( $password, $hash))
    {    
        wp_die(json_encode("success"));
    }

    else
    {
        wp_die(json_encode("failed"));
    }    
    wp_die();
} 
add_action('wp_ajax_verify_field','verify_field2'); 
add_action('wp_ajax_nopriv_verify_field','verify_field2');   

function check_duplicate_entry($phone,$email)
{
    global $wpdb;
    $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM 23_sjpostmeta WHERE meta_value = '".$phone."'OR meta_value = '".$email."'");
    if($rowcount>=1)
    {
        return false;
    }
    else
    {
        return true;
    }
    wp_die();

}

?>