<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller\Auth;

use Symfony\Component\HttpFoundation\Request;
use Orkestra\Bundle\ApplicationBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * @Route
 */
class PasswordResetController extends Controller
{
    /**
     * Displays a form to request a reset
     *
     * @Route("/reset-password", name="reset_password")
     * @Template
     */
    public function newAction()
    {
        $form = $this->getResetForm();

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * Resets a user's password and emails them the temporary password
     *
     * @Route("/reset-password/reset", name="reset_password_reset")
     * @Method("POST")
     * @Template("OrkestraApplicationBundle:Auth/PasswordReset:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $form = $this->getResetForm();
        $form->bind($request);

        $reset = false;

        if ($form->isValid()) {
            $email = $form->get('email')->getData();
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('OrkestraApplicationBundle:User')->findOneBy(array('email' => $email));

            if ($user) {
                $password = $this->generatePassword();
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $user->setPassword($encoder->encodePassword($password, $user->getSalt()));

                // Send email
                $body = $this->renderView('OrkestraApplicationBundle:Auth/PasswordReset:resetEmail.html.twig', array('user' => $user, 'password' => $password));
                $from = $this->container->getParameter('orkestra.system_email_address');

                $message = new \Swift_Message();
                $message->setFrom($from)
                    ->setReplyTo($from)
                    ->setTo($user->getEmail())
                    ->setSubject('Your password has been reset')
                    ->setBody($body, 'text/html');

                $this->get('mailer')->send($message);

                $em->persist($user);
                $em->flush();

                $reset = true;
            } else {
                $form->addError(new FormError('Invalid or unknown email address'));
            }
        }

        return array(
            'reset' => $reset,
            'form' => $form->createView()
        );
    }

    /**
     * Semi-random password generator for generating temporary passwords
     */
    private function generatePassword()
    {
        $salt = md5(uniqid(mt_rand()));

        $slice = mt_rand(0, 21);

        return substr(md5(uniqid($salt, true)), $slice, 10);
    }

    private function getResetForm()
    {
        return $this->createFormBuilder()
            ->add('email', 'email')
            ->getForm();
    }
}
