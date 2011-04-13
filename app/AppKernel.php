<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
#            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new Acme\DemoBundle\AcmeDemoBundle(),

            new Symfony\Bundle\DoctrinePHPCRBundle\DoctrinePHPCRBundle(),

            new FOS\UserBundle\FOSUserBundle(),
            new FOS\FacebookBundle\FOSFacebookBundle(),
            new FOS\RestBundle\FOSRestBundle(),

            new Liip\ContainerWrapperBundle\LiipContainerWrapperBundle(),
            new Liip\HelloBundle\LiipHelloBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Symfony\Bundle\WebConfiguratorBundle\SymfonyWebConfiguratorBundle();
            $bundles[] = new Liip\FunctionalTestBundle\LiipFunctionalTestBundle();
            $bundles[] = new JMS\DebuggingBundle\JMSDebuggingBundle($this);
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
