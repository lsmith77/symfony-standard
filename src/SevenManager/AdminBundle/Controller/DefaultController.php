<?php

namespace SevenManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/abc/{name}", name="seven_manager_admin_default")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}
