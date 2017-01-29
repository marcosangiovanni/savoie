<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Util\Utility as Utility;

class CompanyAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper){
        $formMapper	->add('name', null, array('attr' => array('style' => Utility::FIELD_STYLE_MEDIUM)))
 					->add('position','point')
		;
    }
	
    protected function configureDatagridFilters(DatagridMapper $datagridMapper){
        $datagridMapper	->add('name');
    }

    protected function configureListFields(ListMapper $listMapper){
        $listMapper	->addIdentifier('id')
					->addIdentifier('name')
		;
    }
}

?>