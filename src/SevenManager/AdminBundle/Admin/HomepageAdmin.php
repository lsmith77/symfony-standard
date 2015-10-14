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

    class HomepageAdmin extends Admin
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

        protected function configureFormFields(FormMapper $formMapper)
        {
            $formMapper
                ->with('abc')
                ->add('title', 'text')
                ->add('name', 'text')
                ->add('content', 'textarea')
                ->end();
        }

        public function prePersist($document)
        {
            $parent = $this->getModelManager()->find(null, '/seven-manager/homepage');
            $document->setParentDocument($parent);
        }

        protected function configureDatagridFilters(DatagridMapper $datagridMapper)
        {
            $datagridMapper
                ->add('title', 'doctrine_phpcr_string')
                ->add('name',  'doctrine_phpcr_nodename');
        }

        public function getExportFormats()
        {
            return array();
        }
    }