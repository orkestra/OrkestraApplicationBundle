<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller\Auth;

use Doctrine\ORM\EntityNotFoundException;
use Orkestra\Bundle\ApplicationBundle\Http\JsonErrorResponse;
use Symfony\Component\HttpFoundation\Request;
use Orkestra\Bundle\ApplicationBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route
 */
class PasswordSetController extends Controller
{
    const CURRENT_USER_ID_KEY = '__orkestra_set_password_user_id';
    
    /**
     * Displays a form to request a reset
     *
     * @Route("/set-password/{hash}", name="orkestra_password_set_new")
     * @Template
     */
    public function newAction(Request $request, $hash)
    {
        $passwordHelper = $this->get('orkestra.application.helper.password');
        $hashedEntityHelper = $this->get('orkestra.application.helper.hashed_entity');
        $hashedEntity = $passwordHelper->lookup($hash);
        if (!$hashedEntity) {
            throw new EntityNotFoundException();
        }
        $user = $hashedEntity->getReferencedObject();
        $hashedEntityHelper->invalidate($hashedEntity);

        $em = $this->getDoctrine()->getManager();
        $em->persist($hashedEntity);
        $em->flush();

        if ($user) {
            $request->getSession()->set(PasswordSetController::CURRENT_USER_ID_KEY, $user->getId());
            $form = $this->getSetPasswordForm();

            return array(
                'form' => $form->createView()
            );
        } else {
            throw $this->createNotFoundException('No user was found.');
        }

    }

    /**
     * Resets a user's password and emails them the temporary password
     *
     * @Route("/set-password", name="orkestra_password_set_create", defaults={"_format"="json"})
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $form = $this->getSetPasswordForm();
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\User')->find($request->getSession()->get(PasswordSetController::CURRENT_USER_ID_KEY));

            if ($user) {
                $password = $form->get('password')->getData();
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $user->setPassword($encoder->encodePassword($password, $user->getSalt()));

                $em->persist($user);
                $em->flush();
                $this->get('session')->getFlashBag()->set('success', 'Your password has been set.');

                return $this->redirect($this->generateUrl('login'));
            }
        }

        return new JsonErrorResponse('The passwords provided do not match.');
    }

    private function getSetPasswordForm()
    {
        return $this->createFormBuilder()
            ->add('password', 'repeated', array(
                'type'        => 'password',
                'first_name'  => 'password',
                'second_name' => 'confirm'
            ))
            ->getForm();
    }
}
