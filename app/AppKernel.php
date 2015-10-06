<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // Symfony Standard Edition Bundles
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Symfony CMF Standard Edition Bundles
            new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
            new Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),
            new Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
            new Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new Symfony\Cmf\Bundle\SimpleCmsBundle\CmfSimpleCmsBundle(),
            new Symfony\Cmf\Bundle\SeoBundle\CmfSeoBundle(),
            new \Burgov\Bundle\KeyValueFormBundle\BurgovKeyValueFormBundle(),
            new Liip\SearchBundle\LiipSearchBundle(),
            new Symfony\Cmf\Bundle\SearchBundle\CmfSearchBundle(),
            new Symfony\Cmf\Bundle\MediaBundle\CmfMediaBundle(),
            new FM\ElfinderBundle\FMElfinderBundle(),
            new Symfony\Cmf\Bundle\RoutingAutoBundle\CmfRoutingAutoBundle(),

            new Symfony\Cmf\Bundle\CreateBundle\CmfCreateBundle(),
            new FOS\RestBundle\FOSRestBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),

            // Admin Bundle's
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\DoctrinePHPCRAdminBundle\SonataDoctrinePHPCRAdminBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),

            // Media support
            new Liip\ImagineBundle\LiipImagineBundle(),

            // block caching and feeds
            new Sonata\CacheBundle\SonataCacheBundle(),
            new Eko\FeedBundle\EkoFeedBundle(),

            // and the app bundle
            new AppBundle\AppBundle(),

            // language switcher
            new Lunetics\LocaleBundle\LuneticsLocaleBundle(),

            // Remove this Bundle when using the SE as the basis for a new project
            new Acme\DemoBundle\AcmeDemoBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
