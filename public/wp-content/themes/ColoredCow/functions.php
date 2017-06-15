<?php 
require_once "mailer.php";

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
        wp_enqueue_style('cc-admin-bootstrap-css', get_template_directory_uri().'/dist/lib/css/bootstrap.min.css', '', '1.0.0');
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
    $guest_name = $_POST['name'];
    $post_phone = $_POST['phone'];
    $post_email = $_POST['email'];
    $post_password= $_POST['password'];
    $post_gender= $_POST['gender'];
    $hash = wp_hash_password( $post_password );
    if( check_duplicate_entry($post_phone,$post_email) == true ){
        $my_post = array(
          'post_title'    => $guest_name,
          'post_status'   => 'publish',
          'post_type'     => 'guest'
         );
        $post_id = wp_insert_post( $my_post );
        if( !$post_id ){
            wp_send_json_error();
        }

        add_post_meta($post_id, 'phone', $post_phone);
        add_post_meta($post_id, 'email', $post_email);
        add_post_meta($post_id, 'password', $hash);
        add_post_meta($post_id, 'gender', $post_gender);
        $host_info = get_userdata(get_current_user_id());
        $host_name = $host_info->first_name;
        // var_dump($host_name);
        // wp_die();

        // send register email
        $mailer = new Mailer();
        $mailer->set_template( 'WelcomeToSoiree' );
        $mailer->set_mail_subject( 'Welcome to ColoredCow Soiree' );
        $mailer->set_host( array( 'email' => get_option('admin_email'), 'name' => $host_name ) );
        $mail_recipients = array(
                array( 'email' => $post_email, 'name' => $guest_name )
            );
        $mailer->set_recipients( $mail_recipients );
        $merge_vars = array(
                $post_email => array( 'first_name' => $guest_name )
            );
        $mailer->set_merge_vars( $merge_vars );
        $mailer->send_mail_template();
        wp_send_json_success();

    } else{
        wp_send_json_error();
    }
}
add_action('wp_ajax_add_subscriber', 'add_subscriber');
add_action('wp_ajax_nopriv_add_subscriber', 'add_subscriber');

function verify_credentials(){
    global $wpdb;
    if(isset($_POST['password'])&&isset($_POST['eventID'])):
        $tablename = $wpdb->prefix.'postmeta';
        $password = $_POST['password'];
        $event_id = $_POST['eventID'];
        $meta_key = 'event_users';
        $event_users = get_post_meta( $event_id, $meta_key, true );
        $rsvp_date = date("d/m/y");
        $guest_email = $_POST['guest_email'];
        $rsvp_guest_id = $wpdb->get_var("SELECT post_id FROM $tablename WHERE meta_value = '".$guest_email."'");
        $hash = get_post_meta($rsvp_guest_id,'password',true);
        $guest_name = get_the_title($rsvp_guest_id);
        $soiree_name = get_the_title($event_id);
        $soiree_date = get_post_meta($event_id,'event_date',true);
        $host_info = get_userdata(get_current_user_id());
        $host_name = $host_info->first_name;
        $host_email = get_option('admin_email');
        if(!wp_check_password( $password, $hash)){
            wp_send_json_error("failed");
        }
        if(array_key_exists($rsvp_guest_id,$event_users)){
            wp_send_json_error("duplicate");
        }
        $event_users = get_post_meta( $event_id, $meta_key, true );
        $event_users[$rsvp_guest_id] = get_rsvp_guest_meta( $guest_name );
        $event_users ? update_post_meta( $event_id, $meta_key, $event_users ) : add_post_meta($event_id, $meta_key, $event_users);
        // rsvp mail
        $mailer = new Mailer();
        $mailer->set_template( 'ThanksForRSVP' );
        $mailer->set_mail_subject( 'Thank you for your response' );
        $mailer->set_host( array( 'email' => get_option('admin_email'), 'name' => $host_name ) );
        $mail_recipients = array(
                array( 'email' => $guest_email, 'name' => $guest_name )
            );
        $mailer->set_recipients( $mail_recipients );
        $merge_vars = array(
                $guest_email => array( 'first_name' => $guest_name, 'soiree_name' => $soiree_name, 'soiree_date' => $soiree_date )
            );
        $mailer->set_merge_vars( $merge_vars );
        $mailer->send_mail_template();
        wp_send_json_success("success");
    endif;
} 
add_action('wp_ajax_verify_credentials','verify_credentials'); 
add_action('wp_ajax_nopriv_verify_credentials','verify_credentials');

function check_duplicate_entry($phone,$email){
    global $wpdb;
    $tablename = $wpdb->prefix."postmeta";
    $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM $tablename WHERE meta_value = '".$phone."'OR meta_value = '".$email."'");
    return $rowcount ? false : true;
}

function wpdocs_register_event_attendance_page() {
    add_menu_page( 'Event Attendance','Event Attendance', 'manage_options', 'event-attendance', 'event_attendance_screen' );
}
add_action( 'admin_menu', 'wpdocs_register_event_attendance_page' );

function event_attendance_screen() {
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
    if(isset($_POST['event_id'])):
        $event_id = $_POST['event_id']; 
        $meta_key = 'event_users';
        $event_users = get_post_meta( $event_id, $meta_key, true );
        echo get_event_users_html($event_id, $event_users);
    endif;
    wp_die();
}
add_action('wp_ajax_get_event_users', 'get_event_users');

function change_status(){
    if(isset($_POST['event_id'])&&isset($_POST['guest_id'])&&isset($_POST['change_to_status'])):
        $event_id = $_POST['event_id'];
        $guest_id = $_POST['guest_id'];
        $change_to_status = $_POST['change_to_status'];
        $meta_key = 'event_users';
        $event_users = get_post_meta( $event_id, $meta_key, true );
        $event_users[$guest_id]['status'] = $change_to_status;
        update_post_meta( $event_id, $meta_key, $event_users );
        echo get_event_users_html( $event_id, $event_users );
        throw "data.error.msg";
    endif;
    wp_die();
}
add_action('wp_ajax_change_status', 'change_status');