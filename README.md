Symfony Techtalk Edition
========================

This is a fork of the Symfony Standard Edition that adds various Bundles
and configuration options that I use for demo purposes.

You can read the original README.md here:
https://github.com/symfony/symfony-standard/blob/master/README.md

Make sure to switch to the ``techtalk`` branch

```
git checkout techtalk
```

Then following the installation instructions at the above url.

Make sure to ensure that the ``app/cache`` and ``app/logs`` directories are
write-able for the web server (and also for the CLI):
http://symfony.com/doc/2.0/book/installation.html#configuration-and-setup

List of additional bundles and libs:

    * symfony-cmf (includes DoctrinePHPCRBundle, doctrine-phpcr-odm, jackalope ..)

    * FOSUserBundle
    * FOSFacebookBundle (and facebook PHP SDK)
    * FOSRestBundle

    * LiipContainerWrapperBundle
    * LiipCacheControlBundle
    * LiipHelloBundle
    * LiipVieBundle
    * LiipHyphenatorBundle (and OrgHeiglHyphenator)
    * LiipThemeBundle
    * LiipImagineBundle (and imagine lib)

    * IdeatoTreeBundle
    * SonatajQueryBundle

    * JMSSerializerBundle
    * JMSDebuggingBundle

It also includes the following Bundles which are not enabled:

    * LiipXsltBundle
    * LiipMagentoBundle
    * LiipMultiplexBundle
    * LiipFunctionalTestBundle

The key Bundle in this list is LiipHelloBundle as it provides usage examples
for most of the above mentioned Bundles:
https://github.com/liip/LiipHelloBundle

Furthermore this application shows how to customize the ``app.php``/``app_dev.php``
and ``autoload.php`` to use the ApcUniversalClassLoader while dropping use of the
bootstrap files.
