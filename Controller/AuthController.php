<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\FormError;

class AuthController extends Controller
{
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        $form = $this->createFormBuilder()
            ->add('username', 'text', array('label' => 'Username'))
            ->add('password', 'password', array('label' => 'Password'))
            ->getForm();

        if ($session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $form->addError(new FormError('Invalid username or password'));
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        if ($session->has(SecurityContext::LAST_USERNAME)) {
            $form->setData(array('username' => $session->get(SecurityContext::LAST_USERNAME)));
        }

        return $this->render('OrkestraApplicationBundle:Auth:login.html.twig', array('form' => $form->createView()));
    }
}
