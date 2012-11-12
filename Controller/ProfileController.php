<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Form\FormError,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    JMS\SecurityExtraBundle\Annotation\Secure,
    Orkestra\Bundle\ApplicationBundle\Form\ProfileType,
    Orkestra\Bundle\ApplicationBundle\Form\PreferencesType,
    Orkestra\Bundle\ApplicationBundle\Form\ChangePasswordType;

/**
 * Profile controller.
 *
 * @Route("/profile")
 */
class ProfileController extends Controller
{
    /**
     * Shows the user's profile
     *
     * @Route("/", name="orkestra_profile")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $form = $this->createForm(new ProfileType(), $user);

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();

                try {
                    $em->persist($user);
                    $em->flush();

                    $this->get('session')->setFlash('success', 'Your changes have been saved.');
                    return $this->redirect($this->generateUrl('orkestra_profile'));
                }
                catch (\Exception $e) {
                    $form->addError(new FormError('Could not save changes. If the problem persists, please contact support.'));
                }
            }
        }

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * Show the change password form
     *
     * @Route("/change-password", name="orkestra_profile_password")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function passwordAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $form = $this->createForm(new ChangePasswordType(), array());

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bindRequest($this->getRequest());

            $data = $form->getData();

            if ($data['password'] !== $data['confirm']) {
                $form->addError(new FormError('New password and confirm password must match!'));
            }

            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $current = $encoder->encodePassword($data['current'], $user->getSalt());

            if ($current !== $user->getPassword()) {
                $form->addError(new FormError('Current password is not correct'));
            }

            if ($form->isValid()) {
                $user->setPassword($encoder->encodePassword($data['password'], $user->getSalt()));

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();

                $this->get('session')->setFlash('success', 'Your password has been changed.');
                return $this->redirect($this->generateUrl('profile'));
            }
        }

        return array(
            'form' => $form->createView(),
        );
    }
}
