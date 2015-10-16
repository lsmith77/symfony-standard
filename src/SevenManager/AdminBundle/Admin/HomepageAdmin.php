<?php
    /**
     * Created by PhpStorm.
     * User: lseverino
     * Date: 13/10/15
     * Time: 07:42
     */

    namespace SevenManager\AdminBundle\Admin;

    use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
    use Sonata\AdminBundle\Form\FormMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use SevenManager\ContentBundle\Document\Homepage;

    /**
     * Class HomepageAdmin
     * @package SevenManager\AdminBundle\Admin
     */
    class HomepageAdmin extends Admin
    {

        /**
         * @param ListMapper $listMapper
         */
        protected function configureListFields(ListMapper $listMapper)
        {
            //parent::configureListFields($listMapper);
            $listMapper
                ->addIdentifier('title', 'text')
                ->addIdentifier('name', 'text')
            ;
        }

        /**
         * @param FormMapper $formMapper
         */
        protected function configureFormFields(FormMapper $formMapper)
        {
            // Define Admin fields
            $formMapper
                ->tab('seven_manager.admin.pages.homepage.title')
                    ->with('Required', array(
                        'class'       => 'col-md-6',
                        'box_class'   => 'box box-solid box-danger',
                        'description' => 'Required Content',
                    ))
                        ->add('title', 'text')
                        ->add('name', 'text', array('required' => true))
                        ->add('content', 'textarea', array('required' => true))
                    ->end()
                    ->with('Optional', array(
                        'class'       => 'col-md-6',
                        'box_class'   => 'box box-solid box-danger',
                        'description' => 'Optional Content',
                    ))
                        ->add('subtitle', 'text', array('required' => false))
                        ->add('image', 'cmf_media_image', array('required' => false))
                    ->end()
                ->end()
                ->tab('Slideshow')
                    ->with('Slideshow')
                    ->add(
                        'children',
                        'sonata_type_collection',
                        array(),
                        array(
                            'edit' => 'inline',
                            'inline' => 'table',
                            'sortable'  => 'position',
                            'admin_code' => 'cmf_block.imagine.imagine_admin'
                        )
                    )
                    ->end()
                ->end()
                ->setHelps( array(
                    'title' => 'seven_manager.admin.fields.title.helper',
                    'subtitle' => 'seven_manager.admin.fields.subtitle.helper',
                    'name' => 'seven_manager.admin.fields.name.helper',
                    'content' => 'seven_manager.admin.fields.content.helper',
                    'image' => 'seven_manager.admin.fields.image.helper',
                ))
            ;

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
         * {@inheritdoc}
         */
        public function preUpdate($children)
        {
            foreach ($children->getChildren() as $child) {
                if (! $this->modelManager->getNormalizedIdentifier($child)) {
                    $child->setName($this->generateName());
                }
            }
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
         * @return string
         */
        private function generateName()
        {
            return 'child_' . time() . '_' . rand();
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