<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\SecurityContext;

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
            ->add('username', TextType::class, array('label' => 'Username'))
            ->add('password', PasswordType::class, array('label' => 'Password'))
            ->add('rememberMe', CheckboxType::class, array('label' => 'Remember Me', 'required' => false))
            ->getForm();

        if ($session->has(SecurityContext::LAST_USERNAME)) {
            $form->setData(array('username' => $session->get(SecurityContext::LAST_USERNAME)));
        }

        return array(
            'form' => $form->createView()
        );
    }
}
