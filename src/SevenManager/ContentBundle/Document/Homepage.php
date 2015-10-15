<?php
    /**
     * Created by PhpStorm.
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManager\ContentBundle\Document;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
    use SevenManager\ContentBundle\Block\childMediaBlock;
    use SevenManager\ContentBundle\Block\childTextBlock;
    use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;

    /**
     * @PHPCR\Document(referenceable=true, translator="attribute")
     */
    class Homepage implements RouteReferrersReadInterface, TranslatableInterface
    {
        /**
         * Properties
         */
        use SharedProperties;
        use SharedMedias;

        /**
         * Blocks
         * NOT RECOMMENDED METHOD! TODO BETTER
         */
        use childMediaBlock;

        /**
         * @PHPCR\String(type="string", nullable=true, translated=true)
         */
        protected $label;

        /**
         * @PHPCR\String(type="string", nullable=true, translated=true)
         */
        protected $subtitle;

        /**
         * @return mixed
         */
        public function getLabel()
        {
            return $this->label;
        }

        /**
         * @param $label
         *
         * @return $this
         */
        public function setLabel($label)
        {
            $this->label = $label;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getSubtitle()
        {
            return $this->label;
        }

        /**
         * @param $subtitle
         *
         * @return $this
         */
        public function setSubtitle($subtitle)
        {
            $this->label = $subtitle;

            return $this;
        }

        /**
         * @return string
         */
        public function getType()
        {
            return 'seven_manager.page.homepage';
        }

    }