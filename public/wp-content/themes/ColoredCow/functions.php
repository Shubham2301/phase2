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


function verify_field2()
{
    //echo $_POST['value'];
    global $wpdb;
    $tablename = $wpdb->prefix."soiree";
    $post_verify_email = sanitize_email($_POST['value']);
    //echo $post_verify_email;
    $datum = $wpdb->get_results("SELECT * FROM 23_sjpostmeta WHERE meta_value = '".$_POST['value']."'");
    if($datum)
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

?>