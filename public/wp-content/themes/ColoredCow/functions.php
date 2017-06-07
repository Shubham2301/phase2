<?php 

if ( ! function_exists( 'cc_scripts' ) ) {
    function cc_scripts() {
        wp_enqueue_script('cc-bootstrap', get_template_directory_uri().'/dist/lib/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('main', get_template_directory_uri().'/main.js', array('jquery', 'cc-bootstrap'), '1.1.0', true);
        wp_localize_script( 'main', 'PARAMS', array('ajaxurl' => admin_url('admin-ajax.php')) );
    }
    add_action('wp_enqueue_scripts','cc_scripts');
}

if ( ! function_exists( 'cc_admin_scripts' ) ) {
    function cc_admin_scripts() {
        wp_enqueue_script('cc-admin-main', get_template_directory_uri().'/admin-main.js', array('jquery'), '1.0.0', true);
        wp_localize_script( 'cc-admin-main', 'PARAMS', array('ajaxurl' => admin_url('admin-ajax.php')) );
    }
    add_action('admin_enqueue_scripts','cc_admin_scripts');
}

if ( ! function_exists( 'cc_styles' ) ) {
    function cc_styles() {  
        wp_enqueue_style('et-googleFonts', 'https://fonts.googleapis.com/css?family=El+Messiri:400,700|Gloria+Hallelujah|Indie+Flower');
        wp_enqueue_style('cc-bootstrap', get_template_directory_uri().'/dist/lib/css/bootstrap.min.css');
        wp_enqueue_style('style', get_template_directory_uri().'/style.css');
    }
    add_action('wp_enqueue_scripts','cc_styles');
}

add_filter('show_admin_bar','__return_false');

function add_subscriber(){
    $post_title = $_POST['name'];
    $post_phone = $_POST['phone'];
    $post_email = $_POST['email'];
    $post_password= $_POST['password'];
    $post_gender= $_POST['gender'];
    $hash = wp_hash_password( $post_password );
    if(check_duplicate_entry($post_event_id,$post_phone,$post_email)==true){
        $my_post = array(
          'post_title'    => $post_title,
          'post_status'   => 'publish',
          'post_type'     => 'guest'
         ); 
        $post_id = wp_insert_post( $my_post );
        if('$post_id'){
            add_post_meta($post_id, 'phone', $post_phone);
            add_post_meta($post_id, 'email', $post_email);
            add_post_meta($post_id, 'password', $hash);
            add_post_meta($post_id, 'gender', $post_gender);
        }
        require "mailer.php";
        register_guest_mail($post_email,$post_title,'shubham@coloredcow.com','Shubham');
        wp_send_json_success();
    }
    else{
        wp_send_json_error();
    }
}

add_action('wp_ajax_add_subscriber', 'add_subscriber');
add_action('wp_ajax_nopriv_add_subscriber', 'add_subscriber');



function verify_credentials(){
    global $wpdb;
    $tablename = $wpdb->prefix.'postmeta';
    $password = $_POST['password'];
    $event_id = $_POST['eventID'];
    $meta_key = 'event_users';
    $event_users = get_post_meta( $event_id, $meta_key, true );
    $rsvp_date = date("d/m/y");
    $guest_id = $wpdb->get_var("SELECT post_id FROM $tablename WHERE meta_value = '".$_POST['guest_email']."'");
    $hash = get_post_meta($guest_id,'password',true);

    if( wp_check_password( $password, $hash)){
        if ($event_users[$guest_id]['status']=='pending'||$event_users[$guest_id]['status']=='confirmed'||$event_users[$guest_id]['status']=='declined') {
            wp_send_json_error("duplicate");
        }
        else{
            $meta_key = 'event_users';
            $event_users = get_post_meta( $event_id, $meta_key, true );
            $guest_name = get_the_title( $guest_id );
            if($event_users){
                $event_users[$guest_id] = get_rsvp_guest_meta( $guest_name );
                update_post_meta( $event_id, $meta_key, $event_users );
            } else {
                $event_users[$guest_id] = get_rsvp_guest_meta($guest_name);
                add_post_meta($event_id, $meta_key, $event_users);
            }
            wp_send_json_success("success");
        }
    }
    else{
       wp_send_json_error("failed");
    }
} 
add_action('wp_ajax_verify_credentials','verify_credentials'); 
add_action('wp_ajax_nopriv_verify_credentials','verify_credentials');

function check_duplicate_entry($event,$phone,$email){
    global $wpdb;
    $tablename = $wpdb->prefix."postmeta";
    $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM $tablename WHERE meta_value = '".$phone."'OR meta_value = '".$email."'");
    return $rowcount ? false : true;
}

add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

function wpdocs_register_my_custom_menu_page() {
    add_menu_page( 'Event Attendance','Event Attendance', 'manage_options', 'event-attendance', 'eventAttendancescreen' );
}

function eventAttendancescreen() {
    include "event_attendance.php";
}

function get_rsvp_guest_meta($guest_name){
    return array(
                "status" => "pending",
                "rsvp_date" => date('Y-m-d'),
                "name" => $guest_name
            );
}

function get_event_users_html($event_id, $event_users){
    $html = '';
    foreach( $event_users as $guest_id => $event_user ):
            $html .= '<tr>';
            $html .= '<td>' . $guest_id . '</td>';
            $html .= '<td>' . $event_user['name'] . '</td>';
            $html .= '<td>' . $event_user['rsvp_date'] . '</td>';
            switch ($event_user['status']) {
                case 'pending':
                    $label_class = 'label label-warning';
                    break;
                case 'confirmed':
                    $label_class = 'label label-success';
                    break;
                case 'declined':
                    $label_class = 'label label-danger';
                    break;
                default:
                    $label_class = "";
                    break;
            }
            $html .= '<td><span class="' . $label_class . '">' . $event_user['status'] . '</span></td>';
            $html .= '<td><form class="change_status_form">
                          <input type="hidden" name="event_id" value="' . $event_id . '">
                          <input type="hidden" name="guest_id" value="' . $guest_id . '">
                          <input type="hidden" name="action" value="change_status">
                          <button type="button" class="btn btn-success btn-change-status confirm">Confirm</button>
                          <button type="button" class="btn btn-danger btn-change-status decline">Decline</button>
                      </form>';
            $html .= '</td></tr>';
    endforeach;
    return $html;
}
function get_event_users(){
    $event_id = $_POST['event_id']; 
    $meta_key = 'event_users';
    $event_users = get_post_meta( $event_id, $meta_key, true );
    echo get_event_users_html($event_id, $event_users);
    wp_die();
}
add_action('wp_ajax_get_event_users', 'get_event_users');

function change_status(){
    $event_id = $_POST['event_id'];
    $guest_id = $_POST['guest_id'];
    $change_to_status = $_POST['change_to_status'];
    $meta_key = 'event_users';
    $event_users = get_post_meta( $event_id, $meta_key, true );
    $event_users[$guest_id]['status'] = $change_to_status;
    update_post_meta( $event_id, $meta_key, $event_users );
    echo get_event_users_html($event_id, $event_users);
    wp_die();
}
add_action('wp_ajax_change_status', 'change_status');