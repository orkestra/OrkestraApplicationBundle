<?php

namespace Orkestra\Bundle\ApplicationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * File controller
 *
 * @Route("/file")
 */
class FileController extends Controller
{
    /**
     * Outputs a file
     *
     * @Route("/{id}/view", name="view_file")
     * @Secure(roles="ROLE_USER")
     */
    public function viewAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $file \Orkestra\Bundle\ApplicationBundle\Entity\File */
        $file = $em->find('Orkestra\Bundle\ApplicationBundle\Entity\File', $id);

        if (!$file || !file_exists($file->getPath())) {
            throw $this->createNotFoundException('Unable to locate File');
        }

        $securityContext = $this->get('security.context');

        foreach ($file->getGroups() as $group) {
            if (!$securityContext->isGranted($group->getRole())) {
                throw $this->createNotFoundException('Unable to locate File');
            }
        }

        $response = new Response();
        $response->setLastModified(new \DateTime('@' . filemtime($file->getPath())));
        $response->setPublic();
        if (($hash = $file->getMd5()) !== '') {
            $response->setEtag($hash);
        }

        if ($response->isNotModified($request)) {
            return $response;
        }

        $response->setContent($file->getContent());
        $response->headers->add(array(
            'Content-Type' => $file->getMimeType(),
        ));

        return $response;
    }

    /**
     * Outputs a file for the user to download
     *
     * @Route("/{id}/download", name="download_file")
     * @Secure(roles="ROLE_USER")
     */
    public function downloadAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $file \Orkestra\Bundle\ApplicationBundle\Entity\File */
        $file = $em->find('Orkestra\Bundle\ApplicationBundle\Entity\File', $id);

        if (!$file) {
            throw $this->createNotFoundException('Unable to locate File');
        }

        $securityContext = $this->get('security.context');

        foreach ($file->getGroups() as $group) {
            if (!$securityContext->isGranted($group->getRole())) {
                throw $this->createNotFoundException('Unable to locate File');
            }
        }

        return new Response($file->getContent(), 200, array(
            'Content-Type' => $file->getMimeType(),
            'Content-Disposition' => sprintf('attachment; filename="%s"', $file->getFilename())
        ));
    }
}
