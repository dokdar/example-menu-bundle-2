<?php

namespace Gajdaw\ExampleMenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Gajdaw\ExampleMenuBundle\Entity\Menu;



class DefaultController extends Controller
{

    /**
     * Finds and displays a Menu entity.
     *
     * @Route("/{slug}", name="frontend_menu_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GajdawExampleMenuBundle:Menu')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Menu entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }

}
