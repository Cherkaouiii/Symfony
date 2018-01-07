<?php

namespace RequestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RequestController extends Controller
{
    /**
     * @Route("/requestList", name="requestList")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository("RequestBundle:Request");
        $requestList = $repository->findAll(); 
        return $this->render('RequestBundle:Request:list.html.twig', array('list' => $requestList));
    }
}
