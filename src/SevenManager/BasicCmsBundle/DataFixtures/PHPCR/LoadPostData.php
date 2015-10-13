<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 10/10/15
 * Time: 16:53
 */

namespace SevenManager\BasicCmsBundle\DataFixtures\PHPCR;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\ODM\PHPCR\DocumentManager;
use SevenManager\BasicCmsBundle\Document\SimplePost;

/**
 * Class LoadPostData
 *
 * @package SevenManager\PostsBundle\DataFixtures\PHPCR
 */
class LoadPostData implements FixtureInterface, OrderedFixtureInterface {

    /**
     * @return int
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * @param ObjectManager $documentManager
     */
    public function load(ObjectManager $documentManager)
    {
        if (!$documentManager instanceof DocumentManager) {
            $class = get_class($documentManager);
            throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
        }

        // Parent Document
        $simpleCmsRoot = $documentManager->find(null, '/cms/posts');

        // Child Document - create a new Post object
        $simplePost = new SimplePost();
        $simplePost->setTitle('Simple CMS Post - Loaded by fixtures');
        $simplePost->setContent('I have added this Post myself!');

        // Mapping Parent and Child Documents - get root document (/cms/Posts)
        $simplePost->setParentDocument($simpleCmsRoot); // set the parent to the root

        // Persist and flush
        $documentManager->persist($simplePost); // add the Post in the queue
        $documentManager->flush(); // add the Post to PHPCR
    }
}