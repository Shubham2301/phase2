<?php

require_once get_template_directory() . '/vendor/mandrill/mandrill/src/Mandrill.php';
// require_once __DIR__ . '/../../plugins/wpmandrill/lib/mandrill.class.php';

class Mailer
{
    protected $template;
    protected $mandrill;
    protected $message;

    function __construct()
    {
        $this->mandrill = new Mandrill(WP_MANDRILL_KEY);
    }

    function set_host( $host )
    {
        $this->message['from_email'] = $host['email'];
        $this->message['from_name'] = $host['name'];
    }

    function get_host( $host )
    {
        return array(
                'email' => $this->message['from_email'],
                'name' => $this->message['from_name']
            );
    }

    function set_recipients( $recipients )
    {
        $this->message['to'] = array();
        foreach( $recipients as $recipient ){
            array_push(
                $this->message['to'], 
                array(
                    'email' => $recipient['email'],
                    'name' => $recipient['name'],
                    'type' => 'to'
                )
            );
        }
    }

    function get_recipients()
    {
        return $this->message['to'];
    }


    function get_message()
    {
        return $this->message;
    }

    function get_mail_subject()
    {
        return $this->message['subject'];
    }

    function set_mail_subject( $subject )
    {
        $this->message['subject'] = $subject;
    }

    function get_template()
    {
        return $this->template;
    }

    function set_template( $template )
    {
        $this->template = $template;
    }

    function set_merge_vars( $merge_vars )
    {
        $formatted_merge_vars = array();
        foreach( $merge_vars as $rcpt => $merge_var )
            {
                $rcpt_merge_var = array( 'rcpt' => $rcpt );
            $vars = array();
            foreach( $merge_var as $key => $value )
            {
                array_push( $vars, array( 'name' => $key, 'content' => $value ) );
            }
            $rcpt_merge_var['vars'] = $vars;
            array_push( $formatted_merge_vars, $rcpt_merge_var );
        }
        $this->message['merge_vars'] = $formatted_merge_vars;
    }

    function send_mail_template()
    {
        try{
            return $this->mandrill->messages->sendTemplate( $this->get_template(), '', $this->get_message() );
        } catch(Mandrill_Error $err) {
            echo 'A mandrill error occurred: ' . get_class($err) . ' - ' . $err->getMessage();
            throw $err;
        } catch(Exception $e){
            echo 'exception occured' . $e;
            throw $e;
        }
    } 
}

// function share_with_friend($guest_name,$guest_email,$friend_name,$friend_email,$soiree_name,$soiree_date,$soiree_link){
//     try {
//         $mandrill = new Mandrill('v0tqtpCwhDCIOLFe5Hw-gA');
//         $template_name = 'ShareWithFriend';
//         $message = array(
//             'html' => '<p>Example HTML content</p>',
//             'text' => 'Example text content',
//             'subject' => 'Thank You!!!',
//             'from_email' => $host_email,
//             'from_name' => $host_name,
//             'to' => array(
//                 array(
//                     'email' => $friend_email,
//                     'name' => $friend_name,
//                     'type' => 'to'
//                 )
//             ),
//             'merge_vars' => array(
//                 array(
//                     'rcpt' => $friend_email,
//                     'vars' => array(
//                         array(
//                             'name' => 'friend_name',
//                             'content' => $friend_name
//                         ),
//                         array(
//                             'name' => 'guest_name',
//                             'content' => $guest_name
//                         ),
//                         array(
//                             'name' => 'soiree_name',
//                             'content' => $soiree_name
//                         ),
//                         array(
//                             'name' => 'soiree_date',
//                             'content' => $soiree_date
//                         ),
//                         array(
//                             'name' => 'link',
//                             'content' => $soiree_link
//                         )
//                     )
//                 )
//             ),
//         );
//         $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
//         // var_dump($result);
//     } catch(Mandrill_Error $e) {
//         echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
//         throw $e;
//     }
// }