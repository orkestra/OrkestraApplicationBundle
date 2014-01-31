<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller\Auth;

use Orkestra\Bundle\ApplicationBundle\Http\JsonErrorResponse;
use Orkestra\Bundle\ApplicationBundle\Http\JsonSuccessResponse;
use Symfony\Component\HttpFoundation\Request;
use Orkestra\Bundle\ApplicationBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route
 */
class PasswordResetController extends Controller
{
    /**
     * Displays a form to request a reset
     *
     * @Route("/reset-password", name="orkestra_password_reset_new")
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
     * @Route("/reset-password/reset", name="orkestra_password_reset_create", defaults={"_format"="json"})
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $form = $this->getResetForm();
        $form->bind($request);

        if ($form->isValid()) {
            $email = $form->get('email')->getData();
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('OrkestraApplicationBundle:User')->findOneBy(array('email' => $email));

            if ($user) {
                $passwordHelper = $this->get('epk.application.helper.password');
                $hashedEntity = $passwordHelper->sendEmail($user, 'Password Reset Request');

                $em->persist($user);
                $em->persist($hashedEntity);
                $em->flush();

                return new JsonSuccessResponse('Your password has been reset. Please check your email for further instructions.');
            }
        }

        sleep(2);

        return new JsonErrorResponse('Invalid or unknown email address');
    }

    private function getResetForm()
    {
        return $this->createFormBuilder()
            ->add('email', 'email')
            ->getForm();
    }
}
