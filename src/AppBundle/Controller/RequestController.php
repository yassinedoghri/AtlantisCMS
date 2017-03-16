<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RequestController extends Controller
{
    /**
     * @Template("AppBundle:Request:submit.html.twig")
     * @Route("/requests/submit", name="submit-request")
     */
    public function submitAction(Request $request)
    {
        return array();
    }

    /**
     * @Template("AppBundle:Request:manage.html.twig")
     * @Route("/requests/manage", name="manage-request")
     */
    public function manageAction(Request $request)
    {
        return array();
    }
}
