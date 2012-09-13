<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    JMS\SecurityExtraBundle\Annotation\Secure;

use Orkestra\Bundle\ApplicationBundle\Controller\Controller;

use Orkestra\Bundle\ApplicationBundle\Entity\Group,
    Orkestra\Bundle\ApplicationBundle\Form\GroupType,
    Orkestra\Bundle\ApplicationBundle\Listing\Admin\GroupOptions;

/**
 * Group controller.
 *
 * @Route("/admin")
 */
class GroupController extends Controller
{
    /**
     * Lists all Group entities.
     *
     * @Route("/groups", name="admin_groups")
     * @Template()
     */
    public function indexAction()
    {
        $listing = $this->createListing(new GroupOptions($this->getDoctrine()->getEntityManager()));

        return array(
            'listing' => $listing
        );
    }

    /**
     * Finds and displays a Group entity.
     *
     * @Route("/group/{id}/show", name="admin_group_show")
     * @Template()
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
     * @Route("/group/new", name="admin_group_new")
     * @Template()
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
     * @Route("/group/create", name="admin_group_create")
     * @Method("post")
     * @Template("OrkestraBundle:Group:new.html.twig")
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

            return $this->redirect($this->generateUrl('admin_group_show', array('id' => $group->getId())));

        }

        return array(
            'group' => $group,
            'form' => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Group entity.
     *
     * @Route("/group/{id}/edit", name="admin_group_edit")
     * @Template()
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
     * @Route("/group/{id}/update", name="admin_group_update")
     * @Method("post")
     * @Template("OrkestraBundle:Group:edit.html.twig")
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

            return $this->redirect($this->generateUrl('admin_group_show', array('id' => $id)));
        }

        return array(
            'group' => $group,
            'form' => $form->createView(),
        );
    }
}
