<?php

namespace App\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {        
        $em = $this->getDoctrine()->getManager();
               
        $invitados = $em->getRepository('AppBundle:Invitados')->findAll();
        $request = $this->getRequest();
        $nameRouting = $request->get('nombre');
        $alias = 'nada';
        foreach($invitados as $invitados){
            if($nameRouting == $invitados->getNombreCompleto()){
                $alias = $invitados->getAlias();
                $confirmacion = $invitados->getConfirmacion();
                
            }
        }      
        
        return $this->render('AppBundle:Default:index.html.twig', array(
            'nombre' => $alias,
            'confirmacion' => $confirmacion
        ));
    }
    
}
