<?php

    namespace BackBundle\Document\ContentTypes;

    use BackBundle\Document\Traits\TitleDescTrait;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * @PHPCR\Document(referenceable=true)
     */
    class TitleDesc implements RouteReferrersReadInterface
    {
        use TitleDescTrait;
    }