<?php
    /**
     * Created by PhpStorm.
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManager\ContentBundle\Document;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
    use SevenManager\ContentBundle\Traits\SharedProperties;
    use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;
    use Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface;

    /**
     * @PHPCR\Document(referenceable=true, translator="attribute")
     */
    class Gallery implements
        RouteReferrersReadInterface,
        TranslatableInterface
    {
        use SharedProperties;
        /**
         * @PHPCR\String(type="string", nullable=true)
         */
        protected $label;

        /**
         * @PHPCR\String(type="string", nullable=true)
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

    }