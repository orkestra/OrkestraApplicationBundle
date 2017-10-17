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
use Symfony\Component\HttpFoundation\Request;
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
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        $form = $this->createFormBuilder()
            ->add('username', TextType::class, array('label' => 'Username'))
            ->add('password', PasswordType::class, array('label' => 'Password'))
            ->add('rememberMe', CheckboxType::class, array('label' => 'Remember Me', 'required' => false))
            ->getForm();

        $helper = $this->get('security.authentication_utils');
        if ($lastUsername = $helper->getLastUsername()) {
            $form->setData(array('username' => $lastUsername));
        }

        return array(
            'form' => $form->createView()
        );
    }
}
