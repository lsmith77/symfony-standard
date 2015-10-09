# Symfony CMF Standard Edition (SE)

[![Build Status](https://secure.travis-ci.org/symfony-cmf/standard-edition.png?branch=master)](http://travis-ci.org/symfony-cmf/standard-edition)
[![Latest Stable Version](https://poser.pugx.org/symfony-cmf/standard-edition/version.png)](https://packagist.org/packages/symfony-cmf/standard-edition)
[![Total Downloads](https://poser.pugx.org/symfony-cmf/standard-edition/d/total.png)](https://packagist.org/packages/symfony-cmf/standard-edition)

The Symfony CMF Standard Edition (SE) is a distribution of the
[Symfony Content Management Framework (CMF)](http://cmf.symfony.com/)
and licensed under the [MIT License](LICENSE).

This distribution is based on all the main CMF components needed for most common
use cases, and can be used to create a new Symfony/CMF project from scratch.

## Requirements

* Symfony 2.3.x
* See also the `require` section of [composer.json](composer.json)


## Quick start

#### Clone Symfony CM
- git clone https://github.com/luiseverino-com/symfony-sonata.git

#### Install Vendors
- composer install

#### Setup Database
- php app/console doctrine:database:create
- php app/console doctrine:phpcr:init:dbal
- php app/console doctrine:phpcr:repository:init
- php app/console doctrine:phpcr:fixtures:load

#### Set permissions
- chmod -R 777 app web


## Documentation

#### Installing the Standard Edition
http://symfony.com/doc/current/cmf/book/installation.html

#### The Symfony CMF Book
http://symfony.com/pdf/Symfony_cmf_master.pdf

#### Coding Standards (Contributing to Symfony)
http://symfony.com/doc/current/contributing/code/standards.html

#### Block's documentation
http://symfony.com/doc/current/cmf/bundles/block/index.html
https://sonata-project.org/bundles/block/master/doc/index.html

#### PHPStorm Plugins - Symfony 2 
http://plugins.jetbrains.com/plugin/7320
http://plugins.jetbrains.com/plugin/7219


## See also:

* [All Symfony CMF documentation](http://symfony.com/doc/master/cmf/index.html) - complete Symfony CMF reference
* [Symfony CMF Website](http://cmf.symfony.com/) - introduction, live demo, support and community links

## Contributing

Pull requests are welcome. Please see our [CONTRIBUTING](https://github.com/symfony-cmf/symfony-cmf-docs/blob/master/CONTRIBUTING.md) guide.

Unit and/or functional tests exist for this bundle. See the
[Testing documentation](http://symfony.com/doc/master/cmf/components/testing.html)
for a guide to running the tests.

Thanks to
[everyone who has contributed](https://github.com/symfony-cmf/standard-edition/contributors) already.