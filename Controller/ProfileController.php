<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Orkestra\Bundle\ApplicationBundle\Form\ProfileType;
use Orkestra\Bundle\ApplicationBundle\Form\ChangePasswordType;

/**
 * Profile controller.
 *
 * @Route("/profile")
 */
class ProfileController extends Controller
{
    /**
     * Shows the form and handles updating user information
     *
     * @Route("", name="orkestra_profile")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(new ProfileType(), $user);

        if ($request->isMethod('POST')) {
            $form->bind($this->getRequest());

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                try {
                    $em->persist($user);
                    $em->flush();

                    $this->get('session')->setFlash('success', 'Your changes have been saved.');

                    return $this->redirect($this->generateUrl('orkestra_profile'));
                } catch (\Exception $e) {
                    // TODO: Why is this being caught?
                    $form->addError(new FormError('Could not save changes. If the problem persists, please contact support.'));
                }
            }
        }

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * Shows and handles changing a user's password
     *
     * @Route("/change-password", name="orkestra_profile_password")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function passwordAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(new ChangePasswordType());

        if ($request->isMethod('POST')) {
            $form->bind($request);
            $data = $form->getData();

            /** @var $factory \Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface */
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $current = $encoder->encodePassword($data['current'], $user->getSalt());

            if ($current !== $user->getPassword()) {
                $form->get('current')->addError(new FormError('Current password is not correct'));
            }

            if ($form->isValid()) {
                $user->setPassword($encoder->encodePassword($data['password'], $user->getSalt()));

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $this->get('session')->setFlash('success', 'Your password has been changed.');

                return $this->redirect($this->generateUrl('orkestra_profile'));
            }
        }

        return array(
            'form' => $form->createView(),
        );
    }
}
