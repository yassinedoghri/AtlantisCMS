<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Template("AppBundle:Default:index.html.twig")
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // get all crisis
        $data = $this->getDoctrine()->getManager()->getRepository('AppBundle:Crisis')->findAll();
        $usercount = $this->getDoctrine()->getManager()->getRepository('AppBundle:User')->findAll();
        dump($data);
        return array('data' => $data, 'usercount' => $usercount);
    }
}
