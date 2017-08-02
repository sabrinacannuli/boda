<?php

namespace App\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\AppBundle\Entity\Invitados;

class DefaultController extends Controller
{
    public function indexAction($nombre)
    {        
        $em = $this->getDoctrine()->getManager();
               
        $invitados = $em->getRepository('AppBundle:Invitados')->findByNombreCompleto($nombre);
        $request = $this->getRequest();
        $nameRouting = $request->get('nombre');
        $nombreCompleto = $request->get('nombreCompleto');

        $alias=$invitados[0]->getAlias();
        $nombreCompleto=$invitados[0]->getNombreCompleto();
        $confirmacion=$invitados[0]->getConfirmacion();

        if($confirmacion == 'si'){
            $msj = "Gracias por confirmar tu asistencia, te esperamos!";
        }else{
            $msj = "";
        }
        
        return $this->render('AppBundle:Default:index.html.twig', array(
            'nombre' => $alias,
            'nombreCompleto' => $nombreCompleto,
            'confirmacion' => $confirmacion,
            'msj'=> $msj
        ));
    }
    public function confirmAction()
    {        
        $request = $this->getRequest();
        $nombre = $_POST['nombre']
        $em = $this->getDoctrine()->getEntityManager();
        $invitados = $em->getRepository('AppBundle:Invitados')->findByNombreCompleto($nombre);
        $alias=$invitados[0]->getAlias();
        $nombreCompleto=$invitados[0]->getNombreCompleto();
        $confirmacion=$invitados[0]->getConfirmacion();
        
       
        if ($request->getMethod() == 'POST') {

            $em = $this->getDoctrine()->getEntityManager();
            $invitados->upload();
            $invitados->setConfirmacion("si");
            $em->persist($invitados);
            $em->flush();                
        }
        return $this->redirect($this->generateUrl('redirect_ok', array('nombre'=>$nombre)));
    }
}
