<?php

    namespace Promocash\BackBundle\Document\ContentTypes;

    use Promocash\BackBundle\Document\Traits\TitleImageTrait;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * @PHPCR\Document(referenceable=true)
     */
    class TitleImage implements RouteReferrersReadInterface
    {
        use TitleImageTrait;
    }