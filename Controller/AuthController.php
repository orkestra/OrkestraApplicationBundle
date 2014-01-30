<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * User authentication controller
 */
class AuthController extends Controller
{
    /**
     * Displays a form to login
     *
     * @Template
     */
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        $form = $this->createFormBuilder()
            ->add('username', 'text', array('label' => 'Username'))
            ->add('password', 'password', array('label' => 'Password'))
            ->add('rememberMe', 'checkbox', array('label' => 'Remember Me', 'required' => false))
            ->getForm();

        if ($session->has(SecurityContext::LAST_USERNAME)) {
            $form->setData(array('username' => $session->get(SecurityContext::LAST_USERNAME)));
        }

        return array(
            'form' => $form->createView()
        );
    }
}
