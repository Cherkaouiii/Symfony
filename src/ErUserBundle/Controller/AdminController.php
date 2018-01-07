<?php

namespace ErUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminController extends Controller{
    
    /**
     * @Route("/adminPage", name="admin_page")
     */
    public function adminPageAction(Request $request)
    {
        return $this->render("ErUserBundle:Admin:adminPage.html.twig");  
    }
}
