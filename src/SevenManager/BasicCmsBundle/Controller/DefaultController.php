<?php

namespace SevenManager\BasicCmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SevenManagerBasicCmsBundle:Default:index.html.twig', array('name' => $name));
    }
}
