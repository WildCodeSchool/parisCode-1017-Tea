<?php
/**
 * Created by PhpStorm.
 * User: LN-T
 * Date: 30/11/2017
 * Time: 18:46
 */

namespace Tea\Controllers;

use ReCaptcha\ReCaptcha;
use Tea\Model\Repository\ContentManager;

class ContactController extends Controller
{

    public function contactAction()
    {
        $siteKey = APP_CAPTCHA_SITEKEY;
        $secret = APP_CAPTCHA_SECRET;

        if (empty($_POST)) {
            $contentManager = new ContentManager();
            $contents = $contentManager->getAll();
            return $this->twig->render('user/contact/contact.html.twig', array(
                'contents' => $contents
            ));
        }
        else {
            $errors = array();
            //start validation
            if (empty($_POST['firstname'])) {
                $errors['firstname'] = "Merci de bien vouloir saisir votre prénom";
            }
            if (empty($_POST['email'])) {
                $errors['email'] = "Merci de bien vouloir saisir votre adresse email";
            }
            if (empty($_POST['message'])) {
                $errors['message'] = "Merci de bien vouloir saisir votre message";
            }
            if (count($errors) > 0) {
                $contentManager = new ContentManager();
                $contents = $contentManager->getAll();
                return $this->twig->render('user/contact/contact.html.twig', array(
                    'contents' => $contents,
                    'errors' => $errors,
                    'post' => $_POST
                ));
            }
            elseif (count($errors) == 0) {

                $recaptcha = new \ReCaptcha\ReCaptcha($secret);
                $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

                if ($resp->isSuccess()) {
                    return $this->sendEmail($_POST);
                }
                else {
                    return $this->twig->render(
                        'user/contact/contact.html.twig', array(
                        'errors' => $errors,
                        'post' => $_POST
                        )
                    );
                }
            }
        }
    }

    public function sendEmail($infoForm)
    {
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername(APP_CONTACT_MAIL)
            ->setPassword(APP_CONTACT_PWD);

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message for admin
        $message1 = (new \Swift_Message('[VolupT] Vous avez reçu une demande.'))
            ->setFrom([$infoForm['email'] => $infoForm['firstname']])
            ->setTo(['contact.volupt@gmail.com' => 'VolupT'])
            ->setBody(
                $this->twig->render(
                    'user/contact/contactMailAdmin.html.twig', array(
                    'email' => $infoForm)
                ), 'text/html'
            );

        // Create a message for admin
        $message2 = (new \Swift_Message('[VolupT] Merci pour votre message !'))
            ->setFrom(['contact.volupt@gmail.com' => 'VolupT'])
            ->setTo([$infoForm['email'] => $infoForm['firstname']])
            ->setBody(
                $this->twig->render(
                    'user/contact/contactMailUser.html.twig', array(
                    'email' => $infoForm)
                ), 'text/html'
            );

        // Send the message
        $mailer->send($message1);
        $mailer->send($message2);

        return $this->twig->render('user/contact/contactSuccess.html.twig');

    }

}