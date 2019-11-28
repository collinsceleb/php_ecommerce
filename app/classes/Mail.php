<?php

namespace App\Classes;
use PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// $mail = new PHPMailer(true);
class Mail 
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->setup();
    }
    public function setup() {
       $this->mail->isSMTP();
       $this->mail->Mailer = 'smtp';
       $this->mail->SMTPAuth = true;
       $this->mail->SMTPSecure = 'tls';

       $this->mail->Host = getenv('SMTP_HOST');
       $this->mail->Port = getenv('SMTP_PORT');

       $environment = getenv('APP_ENV');
       if($environment === 'local') {$this->mail->SMTPDebug = 2;}

       // Authenticate Info
       $this->mail->Username = getenv('EMAIL_USERNAME');
       $this->mail->Password = getenv('EMAIL_PASSWORD');

       $this->mail->isHTML(true);
       $this->mail->SingleTo = true;

       $this->mail->From = getenv('ADMIN_EMAIL');
       $this->mail->FromName = getenv('Celeb Store');

      return $this->mail->send();
    }
    public function send($data)
    {
        $this->mail->addAddress($data['to'], $data['name']);
        $this->$this->Subject = $data['subject'];
        $this->mail->Body = make($data['view'], array('data' => $data['body']));
    }
}