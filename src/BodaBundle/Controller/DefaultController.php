<?php

namespace BodaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BodaBundle:Default:index.html.twig');
    }
}
