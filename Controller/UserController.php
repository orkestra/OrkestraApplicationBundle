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

use JMS\SecurityExtraBundle\Annotation\Secure;
use Orkestra\Bundle\ApplicationBundle\Entity\User;
use Orkestra\Bundle\ApplicationBundle\Form\ChangePasswordType;
use Orkestra\Bundle\ApplicationBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("/user")
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     * @Route("s/", name="orkestra_users")
     * @Template()
     * @Secure(roles="ROLE_USER_READ")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OrkestraApplicationBundle:User')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}/show", name="orkestra_user_show")
     * @Template()
     * @Secure(roles="ROLE_USER_READ")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to locate User');
        }

        return array(
            'user' => $user,
        );
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/new", name="orkestra_user_new")
     * @Template()
     * @Secure(roles="ROLE_USER_WRITE")
     */
    public function newAction()
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        return array(
            'user' => $user,
            'form' => $form->createView()
        );
    }

    /**
     * Creates a new User entity.
     *
     * @Route("/create", name="orkestra_user_create")
     * @Method("post")
     * @Template("OrkestraApplicationBundle:User:new.html.twig")
     * @Secure(roles="ROLE_USER_WRITE")
     */
    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->bind($request);

        if ($form->isValid()) {
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $user->setPassword($encoder->encodePassword($user->getPassword(), $user->getSalt()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', 'The user has been created.');

            return $this->redirect($this->generateUrl('orkestra_user_show', array('id' => $user->getId())));
        }

        return array(
            'user' => $user,
            'form' => $form->createView()
        );
    }

    /**
     * Reset Password Action
     *
     * @Route("/{id}/reset-password", name="orkestra_user_password_reset")
     * @Template()
     * @Secure(roles="ROLE_USER_WRITE")
     */
    public function resetPasswordAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to locate User');
        }

        $form = $this->createForm(ChangePasswordType::class, null, array('require_current' => false));

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $data = $form->getData();

                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $user->setPassword($encoder->encodePassword($data['password'], $user->getSalt()));

                $em->persist($user);
                $em->flush();

                $this->get('session')->getFlashBag()->set('success', 'The password has been changed.');

                return $this->redirect($this->generateUrl('orkestra_user_show', array('id' => $id)));
            }
        }

        return array(
            'user' => $user,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{id}/edit", name="orkestra_user_edit")
     * @Template()
     * @Secure(roles="ROLE_USER_WRITE")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to locate User');
        }

        $form = $this->createForm(UserType::class, $user, array('include_password' => false));

        return array(
            'user' => $user,
            'form' => $form->createView(),
        );
    }

    /**
     * Edits an existing User entity.
     *
     * @Route("/{id}/update", name="orkestra_user_update")
     * @Method("post")
     * @Template("OrkestraApplicationBundle:User:edit.html.twig")
     * @Secure(roles="ROLE_USER_WRITE")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to locate User');
        }

        $form = $this->createForm(UserType::class, $user, array('include_password' => false));
        $form->bind($request);

        if ($form->isValid()) {
            $em->persist($user);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', 'Your changes have been saved.');

            return $this->redirect($this->generateUrl('orkestra_user_show', array('id' => $id)));
        }

        return array(
            'user' => $user,
            'form' => $form->createView(),
        );
    }
}
