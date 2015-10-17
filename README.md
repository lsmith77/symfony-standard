# Built on Symfony CMF Standard Edition architecture and infrastructure

The Symfony CMF Standard Edition (SE) is a distribution of the
[Symfony Content Management Framework (CMF)](http://cmf.symfony.com/)
and licensed under the [MIT License](LICENSE).

## Quick start

### Requirements

* composer
* Git 1.6+
* PHP >=5.3.9
* php5-intl
* phpunit 3.6+ (optional)

### Clone and enter in project's directory
- git clone https://github.com/luiseverino-com/symfony-sonata.git
- cd symfony-sonata

### Option 1
####  1.1 - Install everything using Makefile (optional)
***make** command must be installed*
- make install-requirements
- make install-vendors
- make install-structure
- make set-permissions

### Option 2
#### 2.1 - Install Vendors/Dependencies
- curl -s http://getcomposer.org/installer | php
- php composer.phar install

#### 2.2 - Setup Database and project structure
- php app/console doctrine:database:create
- php app/console doctrine:phpcr:init:dbal
- php app/console doctrine:phpcr:repository:init
- php app/console doctrine:phpcr:fixtures:load

####  2.3 - Set permissions
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


## Doing ...

### Content types
* Add export content actions
* Trad sonata_type_collection
* Create "Collections of collections"
* Select Block childs in a content type

## Contributing
Thanks to
[everyone who has contributed](https://github.com/symfony-cmf/standard-edition/contributors) already.