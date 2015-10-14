<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 14/10/15
 * Time: 10:16
 */

    namespace SevenManager\ContentBundle\Document;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    trait SharedProperties
    {
        /**
         * @PHPCR\Id()
         */
        protected $id;

        /**
         * @PHPCR\ParentDocument()
         */
        protected $parent;

        /**
         * @PHPCR\String(nullable=true, translated=true)
         */
        protected $title;

        /**
         * @PHPCR\String(nullable=true, translated=true)
         */
        protected $content;

        /**
         * @PHPCR\Referrers(
         *     referringDocument="Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route",
         *     referencedBy="content"
         * )
         */
        protected $routes;

        /**
         * @var string
         * @PHPCR\Locale()
         */
        protected $locale;

        /**
         * @PHPCR\Nodename(nullable=false)
         */
        protected $name;

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param $name
         *
         * @return $this
         */
        public function setName($name)
        {
            $this->name = $name;

            return $this;
        }
        /**
         * {@inheritDoc}
         */
        public function getLocale()
        {
            return $this->locale;
        }

        /**
         * {@inheritDoc}
         */
        public function setLocale($locale)
        {
            $this->locale = $locale;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return mixed
         */
        public function getParentDocument()
        {
            return $this->parent;
        }

        /**
         * @param $parent
         * @return $this
         */
        public function setParentDocument($parent)
        {
            $this->parent = $parent;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param $title
         * @return $this
         */
        public function setTitle($title)
        {
            $this->title = $title;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getContent()
        {
            return $this->content;
        }

        /**
         * @param $content
         * @return $this
         */
        public function setContent($content)
        {
            $this->content = $content;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getRoutes()
        {
            return $this->routes;
        }
    }