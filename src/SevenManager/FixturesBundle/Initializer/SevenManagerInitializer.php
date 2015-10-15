<?php
    /**
     * Created by PhpStorm.
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace Acme\BasicCmsBundle\Initializer;

    use Doctrine\Bundle\PHPCRBundle\Initializer\InitializerInterface;
    use PHPCR\Util\NodeHelper;
    use Doctrine\Bundle\PHPCRBundle\ManagerRegistry;
    use SevenManager\ContentBundle\Document\Homepage;

    class SevenManagerInitializer implements InitializerInterface
    {
        private $basePath;

        public function __construct($basePath = '/seven-manager')
        {
            $this->basePath = $basePath;
        }

        public function init(ManagerRegistry $registry)
        {
            $documentManager = $registry->getManager();
            if ($documentManager->find(null, $this->basePath)) {
                return;
            }

            $homepage = new Homepage();
            $homepage->setName($this->basePath);
            $documentManager->persist($homepage);
            $documentManager->flush();

            $session = $registry->getConnection();

            // Create Fixtures
            NodeHelper::createPath($session, $this->basePath . '/fixtures/routes');

            $session->save();
        }

        public function getName()
        {
            return 'Seven Manager Initializer';
        }
    }
