<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    JMS\SecurityExtraBundle\Annotation\Secure;

use Orkestra\Bundle\ApplicationBundle\Controller\Controller;

use Orkestra\Bundle\ApplicationBundle\Entity\Group,
    Orkestra\Bundle\ApplicationBundle\Form\GroupType;

/**
 * Group controller.
 *
 * @Route("/group")
 */
class GroupController extends Controller
{
    /**
     * Lists all Group entities.
     *
     * @Route("s/", name="orkestra_groups")
     * @Template()
     * @Secure(roles="ROLE_GROUP_READ")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OrkestraApplicationBundle:Group')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Group entity.
     *
     * @Route("/{id}/show", name="orkestra_group_show")
     * @Template()
     * @Secure(roles="ROLE_GROUP_READ")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $group = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\Group')->find($id);

        if (!$group) {
            throw $this->createNotFoundException('Unable to locate Group');
        }

        return array(
            'group' => $group,
        );
    }

    /**
     * Displays a form to create a new Group entity.
     *
     * @Route("/new", name="orkestra_group_new")
     * @Template()
     * @Secure(roles="ROLE_GROUP_WRITE")
     */
    public function newAction()
    {
        $group = new Group();
        $form = $this->createForm(new GroupType(), $group);

        return array(
            'group' => $group,
            'form' => $form->createView()
        );
    }

    /**
     * Creates a new Group entity.
     *
     * @Route("/create", name="orkestra_group_create")
     * @Method("post")
     * @Template("OrkestraApplicationBundle:Group:new.html.twig")
     * @Secure(roles="ROLE_GROUP_WRITE")
     */
    public function createAction()
    {
        $group = new Group();

        $form = $this->createForm(new GroupType(), $group);
        $form->bindRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($group);
            $em->flush();

            $this->get('session')->setFlash('success', 'The group has been created.');

            return $this->redirect($this->generateUrl('orkestra_group_show', array('id' => $group->getId())));

        }

        return array(
            'group' => $group,
            'form' => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Group entity.
     *
     * @Route("/{id}/edit", name="orkestra_group_edit")
     * @Template()
     * @Secure(roles="ROLE_GROUP_WRITE")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $group = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\Group')->find($id);

        if (!$group) {
            throw $this->createNotFoundException('Unable to locate Group');
        }

        $form = $this->createForm(new GroupType(), $group);

        return array(
            'group' => $group,
            'form' => $form->createView(),
        );
    }

    /**
     * Edits an existing Group entity.
     *
     * @Route("/{id}/update", name="orkestra_group_update")
     * @Method("post")
     * @Template("OrkestraApplicationBundle:Group:edit.html.twig")
     * @Secure(roles="ROLE_GROUP_WRITE")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $group = $em->getRepository('Orkestra\Bundle\ApplicationBundle\Entity\Group')->find($id);

        if (!$group) {
            throw $this->createNotFoundException('Unable to locate Group');
        }

        $form = $this->createForm(new GroupType(), $group);

        $form->bindRequest($this->getRequest());

        if ($form->isValid()) {
            $em->persist($group);
            $em->flush();

            $this->get('session')->setFlash('success', 'Your changes have been saved.');

            return $this->redirect($this->generateUrl('orkestra_group_show', array('id' => $id)));
        }

        return array(
            'group' => $group,
            'form' => $form->createView(),
        );
    }
}
