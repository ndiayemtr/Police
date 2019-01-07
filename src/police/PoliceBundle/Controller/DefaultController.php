<?php

namespace police\PoliceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PoliceBundle:Default:index.html.twig');
    }
}
