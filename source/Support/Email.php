<?php

namespace Source\Support;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{

  private $data;

  private $mail;

  public function __construct()
  {

    $this->mail = new PHPMailer();
    $this->data = new \StdClass();

    $this->mail->isSMTP();
    $this->mail->setLanguage("br");
    $this->mail->isHTML(true);
    $this->mail->SMTPAuth = true;
    $this->mail->SMTPSecure = MAIL_ENCRYPTION;
    $this->mail->CharSet = "utf-8";

    $this->mail->Host = MAIL_HOST;
    $this->mail->Port = MAIL_PORT;
    $this->mail->Username = MAIL_USERNAME;
    $this->mail->Password = MAIL_PASSWORD;
  }

  public function bootstrap(string $subject, string $body, string $recipient, string $recipientName): Email
  {
    $this->data->subject = $subject;
    $this->data->body = $body;
    $this->data->recipient_email  = $recipient;
    $this->data->recipientName = $recipientName;
    return $this;
  }

  public function send(string $from = MAIL_FROM_ADDRESS, string $fromName = MAIL_FROM_NAME)
  {
    // if (empty($this->data)) {
    // }

    // if (!is_email($this->data->recipient_email)) {
    // }

    // if (!is_email($from)) {
    // }


    try {
      $this->mail->subject = $this->data->subject;
      $this->mail->msgHTML($this->data->body);
      $this->mail->addAddress($this->data->recipient_email,$this->data->recipientName);
      $this->mail->setFrom($from, $fromName);
      $this->mail->send();
      return  true;
    } catch (Exception $exception) {
      return false;
    }
  }
}
