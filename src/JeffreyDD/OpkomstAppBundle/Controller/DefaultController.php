<?php

namespace JeffreyDD\OpkomstAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('JDDOpAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
