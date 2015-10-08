<?php

namespace SevenManager\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("{lang}/abc/{name}", name="seven_manager_admin_default")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/{language}/slideshow/{machine_name}", name="get_slideshow")
     * @Template("SevenManagerAdminBundle:Admin:Presentation/slideshow.html.twig")
     */
    public function slideshowAction($machine_name)
    {
        //promoslide
        return array();
    }
}
