<?php

namespace App\Controllers;

use App\Classes\Mail;

class IndexController  extends BaseController
{
    public function show() 
    {
        echo "Inside Homepage from controller class";
        $data = [
        'to' => 'kolawole.afuye@gmail.com',
        'subject' => 'Welcome to Celeb Store',
        'view' => 'welcome',
        'name' => 'John Doe',
        'body' => 'Testing email template'
    ];
        $mail = new Mail();
        if($mail->send($data)) {
            echo " Email sent successfully";
        } else {
            echo "Email not successfully sent";
        }
    }
}