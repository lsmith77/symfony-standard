<?php

    namespace Promocash\BackBundle\Document\Traits;

    use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

    trait TitleDescTrait
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
         * @PHPCR\Nodename()
         */
        protected $title;

        /**
         * @PHPCR\String(nullable=true)
         */
        protected $content;

        protected $routes;

        public function getId()
        {
            return $this->id;
        }

        public function getParentDocument()
        {
            return $this->parent;
        }

        public function setParentDocument($parent)
        {
            $this->parent = $parent;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function getContent()
        {
            return $this->content;
        }

        public function setContent($content)
        {
            $this->content = $content;
        }

        public function getRoutes()
        {
            return $this->routes;
        }
    }