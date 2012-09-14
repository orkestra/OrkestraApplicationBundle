<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    JMS\SecurityExtraBundle\Annotation\Secure;

use Symfony\Component\Form\FormError;

use Orkestra\Bundle\ApplicationBundle\Controller\Controller;

use Orkestra\Bundle\ApplicationBundle\Entity\User,
    Orkestra\Bundle\ApplicationBundle\Form\UserType;

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
        $em = $this->getDoctrine()->getEntityManager();

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
        $form = $this->createForm(new UserType(), $user);

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
    public function createAction()
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        $form->bindRequest($this->getRequest());

        if ($form->isValid()) {
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $user->setPassword($encoder->encodePassword($user->getPassword(), $user->getSalt()));

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $em->flush();

            $this->get('session')->setFlash('success', 'The user has been created.');
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
    public function resetPasswordAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $user = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to locate User');
        }

        $form = $this->createFormBuilder()
                     ->add('password', 'repeated', array(
                         'type' => 'password',
                         'invalid_message' => 'The passwords must match.',
                         'first_name' => 'password',
                         'second_name' => 'confirm',
                     ))
                     ->getForm();

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());

            if ($form->isValid()) {
                $data = $form->getData();

                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $user->setPassword($encoder->encodePassword($data['password'], $user->getSalt()));

                $em->persist($user);
                $em->flush();

                $this->get('session')->setFlash('success', 'The password has been changed.');

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
        $em = $this->getDoctrine()->getEntityManager();

        $user = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to locate User');
        }

        $form = $this->createForm(new UserType(false), $user);

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
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $user = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('Unable to locate User');
        }

        $form = $this->createForm(new UserType(false), $user);

        $form->bindRequest($this->getRequest());

        if ($form->isValid()) {
            $em->persist($user);
            $em->flush();

            $this->get('session')->setFlash('success', 'Your changes have been saved.');
            return $this->redirect($this->generateUrl('orkestra_user_show', array('id' => $id)));
        }

        return array(
            'user' => $user,
            'form' => $form->createView(),
        );
    }
}
