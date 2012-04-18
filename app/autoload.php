<?php

require __DIR__.'/../vendor/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';
require __DIR__.'/../vendor/symfony/src/Symfony/Component/ClassLoader/ApcUniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\ClassLoader\ApcUniversalClassLoader;
use Doctrine\Common\Annotations\AnnotationRegistry;

if (function_exists('apc_store')) {
    $loader = new ApcUniversalClassLoader('techtalk');
} else {
    $loader = new UniversalClassLoader();
}
$loader->registerNamespaces(array(
    'Symfony\\Cmf'     => array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/symfony-cmf/src'),
    'Symfony'          => array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/bundles'),
    'FOS'              => array(__DIR__.'/../vendor/fos', __DIR__.'/../vendor/bundles'),
    'Liip'             => __DIR__.'/../vendor/bundles',
    'Sensio'           => __DIR__.'/../vendor/bundles',
    'Sonata'           => __DIR__.'/../vendor/bundles',
    'Nelmio'           => __DIR__.'/../vendor/bundles',
    'CG'               => __DIR__.'/../vendor/cg-library/src',
    'JMS'              => __DIR__.'/../vendor/bundles',
    'Doctrine\\Bundle' => __DIR__.'/../vendor/bundles',
    'Doctrine\\Common' => __DIR__. '/../vendor/doctrine-common/lib',
    'Doctrine\\ODM\\PHPCR' => __DIR__.'/../vendor/doctrine-phpcr-odm/lib',
    'Doctrine\\Common\\DataFixtures' => __DIR__.'/../vendor/doctrine-data-fixtures/lib',
    'Doctrine\\DBAL'   => __DIR__.'/../vendor/doctrine-dbal/lib',
    'Doctrine'         => __DIR__.'/../vendor/doctrine/lib',
    'Monolog'          => __DIR__.'/../vendor/monolog/src',
    'Assetic'          => __DIR__.'/../vendor/assetic/src',
    'Metadata'         => __DIR__.'/../vendor/metadata/src',
    'Acme'             => __DIR__.'/../src',
    'Doctrine'         => __DIR__.'/../vendor/doctrine/lib',
    'Jackalope'        => array(
        __DIR__.'/../vendor/jackalope/src',
        __DIR__.'/../vendor/jackalope-doctrine-dbal/src',
    ),
    'PHPCR'            => array(
        __DIR__.'/../vendor/phpcr/src',
        __DIR__.'/../vendor/phpcr-utils/src',
    ),
    'Imagine'          => __DIR__.'/../vendor/imagine/lib',
    'Knp\Menu'         => __DIR__.'/../vendor/KnpMenu/src',
    'DMS'              => __DIR__.'/../vendor/DMS',
    'Profiler'         => __DIR__.'/../vendor/bundles',
    'Behat\Gherkin'    => __DIR__.'/../vendor/behat/gherkin/src',
    'Behat\Behat'      => __DIR__.'/../vendor/behat/behat/src',
    'Behat\Mink'       => __DIR__.'/../vendor/behat/mink/src',
    'Behat\SahiClient' => __DIR__.'/../vendor/behat/sahi/src',
    'Buzz'             => __DIR__.'/../vendor/buzz/lib',
    'Behat\BehatBundle'=> __DIR__.'/../vendor/bundles',
    'Behat\MinkBundle' => __DIR__.'/../vendor/bundles',
    'Org\Heigl\Hyphenator' => __DIR__.'/../vendor/OrgHeiglHyphenator/src',
));

$loader->registerPrefixes(array(
    'Twig_Extensions_' => __DIR__.'/../vendor/twig-extensions/lib',
    'Twig_'            => __DIR__.'/../vendor/twig/lib',
));

// intl
if (!function_exists('intl_get_error_code')) {
    require __DIR__.'/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';

    $loader->registerPrefixFallback(__DIR__.'/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs');
}
if (!interface_exists('SessionHandlerInterface', false)) {
    $loader->registerPrefix('SessionHandlerInterface', __DIR__.'/../vendor/symfony/src/Symfony/Component/HttpFoundation/Resources/stubs');
}
$loader->register();

$loader->registerNamespaceFallbacks(array(
    __DIR__.'/../src',
));
$loader->register();

AnnotationRegistry::registerLoader(function($class) use ($loader) {
    $loader->loadClass($class);
    return class_exists($class, false);
});
AnnotationRegistry::registerFile(__DIR__.'/../vendor/doctrine/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
AnnotationRegistry::registerFile(__DIR__.'/../vendor/doctrine-phpcr-odm/lib/Doctrine/ODM/PHPCR/Mapping/Annotations/DoctrineAnnotations.php');

// Swiftmailer needs a special autoloader to allow
// the lazy loading of the init file (which is expensive)
require __DIR__.'/../vendor/swiftmailer/lib/classes/Swift.php';
Swift::registerAutoload(__DIR__.'/../vendor/swiftmailer/lib/swift_init.php');
