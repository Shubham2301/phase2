<?php
/**
 * Template Name: Mailer
 */

require_once get_template_directory() . '/vendor/mandrill/mandrill/src/Mandrill.php';
function register_email($guest_email,$guest_name,$host_email,$host_name)
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
                    'name' => $guest_name,
                    'type' => 'to'
                )
            ),
            'merge_vars' => array(
                array(
                    'rcpt' => $guest_email,
                    'vars' => array(
                        array(
                            'name' => 'first_name',
                            'content' => $guest_name
                        )
                    )
                )
            ),
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

function rsvp_email($guest_email,$guest_name,$host_email,$host_name,$soiree_date,$soiree_name)
{   
    try {
        $mandrill = new Mandrill('v0tqtpCwhDCIOLFe5Hw-gA');
        $template_name = 'ThanksForRSVP';
        // $template_content = array(
        //     array(
        //         'name' => 'first_name',
        //         'content' => $guest_name
        //     )
        // );
        $message = array(
            'html' => '<p>Example HTML content</p>',
            'text' => 'Example text content',
            'subject' => 'Thank You!!!',
            'from_email' => $host_email,
            'from_name' => $host_name,
            'to' => array(
                array(
                    'email' => $guest_email,
                    'name' => $guest_name,
                    'type' => 'to'
                )
            ),
            'merge_vars' => array(
                array(
                    'rcpt' => $guest_email,
                    'vars' => array(
                        array(
                            'name' => 'first_name',
                            'content' => $guest_name
                        ),
                        array(
                            'name' => 'soiree_name',
                            'content' => $soiree_name
                        ),
                        array(
                            'name' => 'soiree_date',
                            'content' => $soiree_date
                        ),
                    )
                )
            ),
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
