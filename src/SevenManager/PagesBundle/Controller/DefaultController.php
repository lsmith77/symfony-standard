<?php

namespace SevenManager\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SevenManagerPagesBundle:Default:index.html.twig', array('name' => $name));
    }
}
