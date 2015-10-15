<?php
    /**
     * Created by PhpStorm.
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManager\AdminBundle\Admin;

    use SevenManager\ContentBundle\Document\Homepage;
    use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Form\FormMapper;
    use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ImagineBlock;

    class HomepageAdmin extends Admin
    {

        /**
         * @param ListMapper $listMapper
         */
        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper
                ->addIdentifier('title', 'text')
                ->addIdentifier('name', 'text')
                ->addIdentifier('path', 'text')
                ->addIdentifier('lang', 'text')
            ;
        }

        /**
         * @param FormMapper $formMapper
         */
        protected function configureFormFields(FormMapper $formMapper)
        {
            // Define Admin fields
            $formMapper
                ->with('seven_manager.admin.pages.homepage.title')
                ->add('title', 'text')
                ->add('subtitle', 'text', array('required' => false))
                ->add('name', 'text', array('required' => true))
                ->add('content', 'textarea')
                ->add('image', 'cmf_media_image', array('required' => false))
                ->setHelps(array(
                    'title' => 'seven_manager.admin.fields.title.helper',
                    'subtitle' => 'seven_manager.admin.fields.subtitle.helper',
                    'name' => 'seven_manager.admin.fields.name.helper',
                    'content' => 'seven_manager.admin.fields.content.helper',
                    'image' => 'seven_manager.admin.fields.image.helper',
                ))
                ->end()
            ;

        }

        /**
         * @param mixed $document
         * @return $this
         */
        public function prePersist($document)
        {
            $parent = $this->getModelManager()->find(null, '/seven-manager/homepage');
            $document->setParentDocument($parent);

            return $this;
        }

        /**
         * @param DatagridMapper $datagridMapper
         */
        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper
                ->add('title', 'doctrine_phpcr_string')
                ->add('subtitle', 'doctrine_phpcr_string')
                ->add('content', 'doctrine_phpcr_string')
                ->add('name',  'doctrine_phpcr_nodename');
        }

        /**
         * @return array
         */
        public function getExportFormats()
        {
            return array(/**'json', 'xml', 'csv', 'xls'**/);
        }

        /**
         * @param mixed $object
         * Add Title Label to breadcrumb
         * @return mixed|string
         */
        public function toString($object)
        {
            return $object instanceof Homepage && $object->getTitle()
                ? $object->getTitle()
                : $this->trans('link_add', array(), 'SonataAdminBundle')
                ;
        }
    }