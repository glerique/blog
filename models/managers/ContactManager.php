<?php

namespace models\managers;

require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';
require 'lib/PHPMailer/src/Exception.php';

class ContactManager
{
    public function sendEmail($lastname, $firstname, $email, $subject, $content)
    {

        try {
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP 
            $mail->Host = 'smtp.gmail.com'; // Spécifier le serveur SMTP
            $mail->SMTPAuth = true; // Activer authentication SMTP
            $mail->Username = 'admin@gmail.com'; // Votre adresse email d'envoi
            $mail->Password = ''; // Le mot de passe de cette adresse email
            $mail->SMTPSecure = 'ssl'; // Accepter SSL
            $mail->Port = 465;
            $mail->setFrom($email, $lastname . ' ' . $firstname); // Personnaliser l'envoyeur


            //Recipients

            $mail->addAddress('admin@gmail.com', 'Message du Blog');     // Add a recipient
            $mail->addReplyTo($email, 'Information');


            // Content

            $mail->Subject = $subject;
            $mail->Body = $content;


            $mail->send();
            return true;
        }
        // si le try ne marche pas 
        catch (\PHPMailer\PHPMailer\Exception $e) {
            return false;
        }
    }
}
