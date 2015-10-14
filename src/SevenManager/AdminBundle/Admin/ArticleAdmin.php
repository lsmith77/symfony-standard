<?php
    /**
     * Created by PhpStorm.
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManager\AdminBundle\Admin;

    use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Form\FormMapper;

    class ArticleAdmin extends Admin
    {
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
                ->add('name', 'text', array('required' => false))
                ->add('content', 'textarea')
                ->setHelps(array(
                    'title' => 'seven_manager.admin.fields.title.helper',
                    'subtitle' => 'seven_manager.admin.fields.subtitle.helper',
                    'name' => 'seven_manager.admin.fields.name.helper',
                    'content' => 'seven_manager.admin.fields.content.helper',
                ))
                ->end();
        }

        /**
         * @param mixed $document
         * @return $this
         */
        public function prePersist($document)
        {
            $parent = $this->getModelManager()->find(null, '/seven-manager/article');
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
                ->add('name',  'doctrine_phpcr_nodename');
        }

        /**
         * @return array
         */
        public function getExportFormats()
        {
            return array();
        }
    }