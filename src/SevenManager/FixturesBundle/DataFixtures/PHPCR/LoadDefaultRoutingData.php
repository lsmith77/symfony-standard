<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 12/10/15
 * Time: 22:54
 */

namespace SevenManager\FixturesBundle\DataFixtures\PHPCR;
use Doctrine\ODM\PHPCR\DocumentManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route;
use Symfony\Cmf\Bundle\ContentBundle\Doctrine\Phpcr\StaticContent;
use PHPCR\Util\NodeHelper;

/**
 * Class LoadDefaultRoutingData
 *
 * @package SevenManager\FixturesBundle\DataFixtures\PHPCR
 */
class LoadDefaultRoutingData implements FixtureInterface
{
    /**
     * @param ObjectManager $documentManager
     */
    public function load(ObjectManager $documentManager)
    {
        if (!$documentManager instanceof DocumentManager) {
            $class = get_class($documentManager);
            throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
        }

        $session = $documentManager->getPhpcrSession();
        NodeHelper::createPath($session, '/seven-manager/fixtures/routes');

        $route = new Route();
        $route->setParentDocument($documentManager->find(null, '/seven-manager/fixtures/routes'));
        $route->setName('my-page');

        // link a content to the route
        $content = new StaticContent();
        $content->setParentDocument($documentManager->find(null, '/seven-manager/fixtures/content'));
        $content->setName('my-content');
        $content->setTitle('My Content');
        $content->setBody('Some Content');
        $documentManager->persist($content);
        $route->setContent($content);

        $documentManager->persist($route);
        $documentManager->flush();
    }
}