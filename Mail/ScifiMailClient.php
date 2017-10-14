<?php
namespace Kanboard\Plugin\ScifiNotifications\Mail;

use Kanboard\Core\Mail\Transport\Smtp;
use Swift_Message;
use Swift_Mailer;
use Swift_TransportException;

class ScifiMailClient extends Smtp {
    public function sendEmail($recipientEmail, $recipientName, $subject, $html, $authorName, $authorEmail = '') {
        try {
            $message = Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($this->helper->mail->getMailSenderAddress(), $authorName)
                ->setTo(array($recipientEmail => $recipientName));

            $message->setBody($html, 'text/html');
            Swift_Mailer::newInstance($this->getTransport())->send($message);
        } catch (Swift_TransportException $e) {
            $this->logger->error($e->getMessage());
        }
    }
}
