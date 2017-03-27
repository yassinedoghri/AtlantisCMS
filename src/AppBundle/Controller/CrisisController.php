<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CrisisType;
use AppBundle\Entity\Crisis;

class CrisisController extends Controller
{
    /**
     * @Template("AppBundle:Crisis:submit.html.twig")
     * @Route("/crisis/submit", name="submit-crisis")
     */
    public function submitAction(Request $request)
    {
        $crisis = new Crisis();
        $form = $this->createForm(CrisisType::class, $crisis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // new date for submitted_on, last_modification, submitted_by, modified_by
            $datetime = new \DateTime("now", new \DateTimeZone('Asia/Singapore'));

            $user = $this->get('security.token_storage')->getToken()->getUser();
            $crisis2 = $form->getData();

            $crisis2->setSubmittedOn($datetime);
            $crisis2->setLastModification($datetime);
            $crisis2->setSubmittedBy($user);
            $crisis2->setModifiedBy($user);

            $em = $this->getDoctrine()->getManager();
            foreach ($form["assistanceList"]->getData() as $assistance) {
                $request = new \AppBundle\Entity\Request();
                $request->setAssistance($assistance);
                $request->setCrisis($crisis2);

                // Send SMS (asynchronously?) & update request table
                $request->setSentAt($datetime);
                $request->setStatus('to_send');

                $em->persist($request);
            }
            $em->persist($crisis2);
            $em->flush();

            return $this->redirectToRoute('manage-crisis');
        }

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Template("AppBundle:Crisis:manage.html.twig")
     * @Route("/crisis/manage", name="manage-crisis")
     */
    public function manageAction(Request $request)
    {
        return array();
    }
}
