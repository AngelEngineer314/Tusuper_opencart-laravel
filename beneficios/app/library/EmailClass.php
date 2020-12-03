<?php

namespace App\library;
use Mail;


class EmailClass
{

    public function sendEmail($username="",$activation_code="", $toemail="", $type=0, $link="")
    {
        if($type == 0)
        {
            $data = array("name"=> $username, 'token'=>$activation_code);
            $result=Mail::send('mail.activation', $data, function($message) use ($toemail)
            {
                $message->to($toemail, 'Verification email')->subject('Please confirm email verifiction.');
                $message->from(env('MAIL_USERNAME', 'guvavet2019@gmail.com'),"guvavet2019@gmail.com");
            });
        }
        
        return $result;
    }

}
