<?php
/**
 * Template Name: Mailer
 */

require_once get_template_directory() . '/vendor/mandrill/mandrill/src/Mandrill.php';
function register_guest_mail($guest_email,$guest_name,$host_email,$host_name)
{   
    try {
        $mandrill = new Mandrill('v0tqtpCwhDCIOLFe5Hw-gA');
        $template_name = 'WelcomeToSoiree';
        $template_content = array(
            array(
                'name' => 'firstname',
                'content' => $guest_name
            )
        );
        $message = array(
            'html' => '<p>Example HTML content</p>',
            'text' => 'Example text content',
            'subject' => 'Congratulations!!!',
            'from_email' => $host_email,
            'from_name' => $host_name,
            'to' => array(
                array(
                    'email' => $guest_email,
                    //'email' => 'vaibhav@coloredcow.com',
                    'name' => $guest_name,
                    'type' => 'to'
                )
            )
        );
        $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
        // var_dump($result);
    } catch(Mandrill_Error $e) {
        // Mandrill errors are thrown as exceptions
        echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
        // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
        throw $e;
    }
}
