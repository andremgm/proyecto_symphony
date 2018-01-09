<?php

namespace AppBundle\Controller;

use AppBundle\Entity\tema;
use AppBundle\Entity\articuloporautor;
use AppBundle\Entity\autor;
use AppBundle\Entity\comment;
use AppBundle\Entity\articulo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class cientificoController extends Controller
{
    /**
     * @Route("/{_locale}", name="cientifico_list")
     */
    public function indexAction(Request $request)
    {  
        $articulo = $this -> getDoctrine()->getRepository('AppBundle:articulo')->findAll();
        return $this->render('cientifico_views/index.html.twig',array('articulo'=> $articulo ));
    }

    /**
    * @Route("/{_locale}/autores", name="autores_list")
    */
    public function autoresAction(Request $request)
    {    
        $autor = $this -> getDoctrine()->getRepository('AppBundle:autor')->findAll();  
        return $this->render('cientifico_views/autores.html.twig',array('autor'=> $autor ));
    }

    /**
    * @Route("/{_locale}/autores/{id}", name="autores_show")
    */
    public function autorAction($id,Request $request)
    {    
     $articulosPorAutor = $this-> getDoctrine()->getManager()->getRepository('AppBundle:articuloporautor')->getAllArticulos($id);
     $autor = $this -> getDoctrine()->getRepository('AppBundle:autor')->find($id);
     return $this->render('cientifico_views/autor.html.twig', array('autor' => $autor, 'articulosPorAutor' => $articulosPorAutor));
    }

     /**
     * @Route("/{_locale}/articulos", name="articulos_list")
     */
    public function articulosAction(Request $request)
    {
        $articulo = $this -> getDoctrine()->getRepository('AppBundle:articulo')->findAll();   
        return $this->render('cientifico_views/articulos.html.twig',array('articulo'=> $articulo ));
    }

     /**
     * @Route("/{_locale}/articulos/{id}", name="articulos_show")
     */
    public function articuloAction($id, Request $request)
    {

     $articulo = $this -> getDoctrine()->getRepository('AppBundle:articulo')->find($id);
     $comments = $this-> getDoctrine()->getManager()->getRepository('AppBundle:comment')->getCommentsPorArticulo($articulo->getId());
     return $this->render('cientifico_views/articulo.html.twig', array('articulo' => $articulo, 'comments' => $comments));
    }

    /**
     * @Route("/{_locale}/temas", name="temas_list")
     */
    public function temasAction(Request $request)
    {
        $tema = $this -> getDoctrine()->getRepository('AppBundle:tema')->findAll();   
        return $this->render('cientifico_views/temas.html.twig',array('tema'=> $tema ));
    }

        /**
     * @Route("/{_locale}/temas/{id}", name="temas_show")
     */
    public function temaAction($id, Request $request)
    {  
        $articulos = $this-> getDoctrine()->getManager()->getRepository('AppBundle:articulo')->getArticulosPorTema($id);
        return $this->render('cientifico_views/tema.html.twig',array('articulos'=> $articulos));
    }
   

}

