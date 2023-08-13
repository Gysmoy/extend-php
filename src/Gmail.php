<?php

namespace SoDe\Extend;

use PHPMailer\PHPMailer\PHPMailer;

class Gmail
{
    public static function config(?string $name = 'SoDe World')
    {
        $mail = new PHPMailer();
        // $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['MAIL_USERNAME'] || 'example@gmail.com';
        $mail->Password   = $_ENV['MAIL_PASSWORD'] || 'any';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $_ENV['MAIL_PORT'] || 465;
        $mail->Subject    = 'Correo de ' . $name;
        $mail->CharSet    = 'UTF-8';
        $mail->setFrom(
            $_ENV['MAIL_FROM_ADDRESS'] || 'example@gmail.com',
            $_ENV['MAIL_FROM_NAME'] || 'SoDe World'
        );

        return $mail;
    }
}
