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

            $this->get('session')->getFlashBag()->add(
                'notice', array(
                'title' => 'Success',
                'text' => "The crisis has been successfully added!",
                'type' => "success"
            ));
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
        $repository = $this->getDoctrine()->getRepository('AppBundle:Crisis');

        // find *all* crises
        $crises = $repository->findBy(array(), array('id' => 'desc'));

        return array('crises' => $crises);
    }

    /**
     * @Template("AppBundle:Crisis:update.html.twig")
     * @Route("/crisis/update/{id}", name="update-crisis")
     */
    public function updateAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Crisis');
        $crisis = $repository->find($id);

        $repository2 = $this->getDoctrine()->getRepository('AppBundle:Request');
        $requests = $repository2->findBy(array('crisis' => $id));

        $selectedAssistance = array();
        foreach ($requests as $r) {
            array_push($selectedAssistance, $r->getAssistance());
        }

        $form = $this->createForm(CrisisType::class, $crisis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // new date for submitted_on, last_modification, submitted_by, modified_by
            $datetime = new \DateTime("now", new \DateTimeZone('Asia/Singapore'));

            $user = $this->get('security.token_storage')->getToken()->getUser();
            $crisis2 = $form->getData();

            $crisis2->setLastModification($datetime);
            $crisis2->setModifiedBy($user);

            // Check differences between before and after update for assistanceList
            $c1_asl = array();
            $c2_asl = array();
            foreach ($crisis->getAssistanceList() as $assistance) {
                array_push($c1_asl, $assistance->getAssistance()->getId());
            }
            foreach ($form["assistanceList"]->getData() as $assistance) {
                array_push($c2_asl, $assistance->getId());
            }

            $em = $this->getDoctrine()->getManager();
            if ($c1_asl != $c2_asl) {
                // check what has changed
                $to_create = array_diff($c2_asl, $c1_asl);
                $to_delete = array_diff($c1_asl, $c2_asl);

                foreach ($to_create as $assistanceId) {
                    $repository3 = $this->getDoctrine()->getRepository('AppBundle:Assistance');
                    $assistance = $repository3->find($assistanceId);

                    $request = new \AppBundle\Entity\Request();
                    $request->setAssistance($assistance);
                    $request->setCrisis($crisis2);

                    // Send SMS (asynchronously?) & update request table
                    $request->setSentAt($datetime);
                    $request->setStatus('to_send');

                    $em->persist($request);
                }

                foreach ($to_delete as $assistanceId) {
                    $request_d = $repository2->find(array('crisis' => $crisis2->getId(), 'assistance' => $assistanceId));
                    $em->remove($request_d);
                }
            }
            $em->persist($crisis2);
            $em->flush();


            $this->get('session')->getFlashBag()->add(
                'notice', array(
                'title' => 'Success',
                'text' => "The crisis has been successfully updated!",
                'type' => "success"
            ));
            return $this->redirectToRoute('manage-crisis');
        }

        return array(
            'form' => $form->createView(),
            'selectedAssistance' => $selectedAssistance,
        );
    }

    /**
     * @Route("/crisis/delete/{id}", name="delete-crisis")
     */
    public function deleteAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Crisis');

        // find crisis by id
        $crisis = $repository->findOneBy(array('id' => $id));

        $em = $this->getDoctrine()->getManager();

        $em->remove($crisis);
        $em->flush();

        $this->get('session')->getFlashBag()->add(
            'notice', array(
            'title' => 'Crisis Deleted',
            'text' => "The crisis has been successfully deleted!",
            'type' => "info"
        ));
        return $this->redirectToRoute('manage-crisis');
    }

    /**
     * @Route("/crisis/toggle-show/{id}", name="toggle-show-crisis")
     */
    public function toggleShowAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Crisis');

        // find crisis by id
        $crisis = $repository->findOneBy(array('id' => $id));

        $em = $this->getDoctrine()->getManager();

        // toggle showToPublic
        $showToPublic = ($crisis->getShowToPublic() ? 0 : 1);
        $crisis->setShowToPublic($showToPublic);
        $em->flush();

        return $this->redirectToRoute('manage-crisis');
    }
}
