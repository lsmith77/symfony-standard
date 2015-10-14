# Built on Symfony CMF Standard Edition architecture and infrastructure

The Symfony CMF Standard Edition (SE) is a distribution of the
[Symfony Content Management Framework (CMF)](http://cmf.symfony.com/)
and licensed under the [MIT License](LICENSE).

## Quick start

#### Requirements

* PHP >=5.3.9

#### Clone this Symfony CMF based repository
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

    **or**

- [Symfony: The Recommended Way!](http://symfony.com/doc/current/book/installation.html#book-installation-permissions)  
      
  
  
## Documentation

#### Installing the Standard Edition
 - http://symfony.com/doc/current/cmf/book/installation.html

#### The Symfony CMF Book
 - http://symfony.com/pdf/Symfony_cmf_master.pdf  

#### Coding Standards (Contributing to Symfony)  
 - http://symfony.com/doc/current/contributing/code/standards.html  

#### Block's documentation
 - http://symfony.com/doc/current/cmf/bundles/block/index.html  
 - https://sonata-project.org/bundles/block/master/doc/index.html

#### PHPStorm Plugins - Symfony 2 
 - http://plugins.jetbrains.com/plugin/7320
 - http://plugins.jetbrains.com/plugin/7219



## Contributing
Thanks to
[everyone who has contributed](https://github.com/symfony-cmf/standard-edition/contributors) already.