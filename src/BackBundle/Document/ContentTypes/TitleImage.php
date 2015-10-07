<?php

    namespace BackBundle\Document\ContentTypes;

    use BackBundle\Document\Traits\TitleImageTrait;
    use Symfony\Component\Routing\RouteReferrersReadInterface;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    /**
     * @PHPCR\Document(referenceable=true)
     */
    class TitleImage implements RouteReferrersReadInterface
    {
        use TitleImageTrait;
    }