<?php

require_once WP_PLUGIN_DIR . "/wpmandrill/lib/mandrill.class.php";

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
            return $this->mandrill->messages_send_template( $this->get_template(), '', $this->get_message() );
        } catch(Mandrill_Error $err) {
            echo 'A mandrill error occurred: ' . get_class($err) . ' - ' . $err->getMessage();
            throw $err;
        } catch(Exception $e){
            echo 'exception occured' . $e;
            throw $e;
        }
    } 
}