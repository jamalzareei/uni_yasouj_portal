<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of send_mail
 *
 * @author sma
 */
class send_mail {

    //put your code here
    private $sender;
    private $recipients;
    private $body;
    private $subject;

    function __construct($sender) {
        $this->sender = $sender;
        $this->recipients = array();
    }

    function addrecipient($recipient) {
        array_push($this->recipients, $recipient);
    }

    function setsubject($subject) {
        $this->subject = $subject;
    }

    function setbody($body) {
        $this->body = $body;
    }

    function sendmail() {
        foreach ($this->recipients as $recipient) {
            $result = mail($recipient, $this->subject, $this->body, "Form:  $this->sender\r\n");
            if ($result) {
                echo 'ارسال ایمیل با موفقیت انجام گرفت';
            } else {
                echo 'Error Send ';
            }
        }
    }

}

?>
