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
               
        $invitados = $em->getRepository('AppBundle:Invitados')->findOneByNombreCompleto($nombre);
        $request = $this->getRequest();
        $nameRouting = $request->get('nombre');
        $nombreCompleto = $request->get('nombreCompleto');

        $alias=$invitados->getAlias();
        $nombreCompleto=$invitados->getNombreCompleto();
        $confirmacion=$invitados->getConfirmacion();

        if($confirmacion == 'si'){
            $msj = "Gracias por confirmar tu asistencia ¡Te esperamos!";
        }else{
            $msj = "";
        }
        
        if($request->get('modal') == 'show'){
            $modal = $request->get('modal');
        }else{
            $modal = 'hide';
        }
        return $this->render('AppBundle:Default:index.html.twig', array(
            'nombre' => $alias,
            'nombreCompleto' => $nombreCompleto,
            'confirmacion' => $confirmacion,
            'msj'=> $msj,
            'modal'=>$modal
        ));
    }
    public function confirmAction()
    {        
        $request = $this->getRequest();
        $nombre = $_POST['nombre'];
        
        $em = $this->getDoctrine()->getEntityManager();
        $invitados = $em->getRepository('AppBundle:Invitados')->findOneByNombreCompleto($nombre);
        
        $alias=$invitados->getAlias();
        $nombreCompleto=$invitados->getNombreCompleto();
        $confirmacion=$invitados->getConfirmacion();
        
       
        if ($request->getMethod() == 'POST') {

            $em = $this->getDoctrine()->getEntityManager();
            $invitados = $em->getRepository('AppBundle:Invitados')->findOneByNombreCompleto($nombre);
            // var_dump($invitados);
            $invitados->setConfirmacion("si");
            $em->persist($invitados);
            $em->flush();                
        }
        return $this->redirect($this->generateUrl('app_homepage2', array('nombre'=>$nombre,'modal'=>'show')));
    }
}
