<?php

namespace Promocash\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PromocashAppBundle:home:index.html.twig');
    }
}
