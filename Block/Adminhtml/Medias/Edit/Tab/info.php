<?php
namespace Modules\Divabox\Block\Adminhtml\Medias\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config; 

     
class Info extends Generic implements TabInterface
{

    public function __construct(
            Context $context,
            Registry $registry,
            FormFactory $formFactory,
            Config $wysiwygConfig, 
            array $data = [] )
        {
            parent::__construct($context, $registry, $formFactory, $data);
        }


    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('modules_divabox');
		$form = $this->_formFactory->create();
		$form->setHtmlIdPrefix('medias_');
        $form->setFieldNameSuffix('medias');

		$fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('General')]
            );

            if ($model->getId())
            {
                $fieldset->addField(
                    'id',
                    'hidden',
                    ['name' => 'id']
                );
            }

        $fieldset->addField(
                'name',
                'text',
                [
                    'name'        => 'name',
                    'label'    => __('Name'),
                    'required'     => true
                ]
            );

        $fieldset->addField(
                'media',
                'text',
                [
                    'name'        => 'media',
                    'label'    => __('Media'),
                    'required'     => true
                ]
            );
   
        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);

		return parent::_prepareForm();

    }

    public function getTabLabel()
    {
            return __('Informations');
    }
 
    public function getTabTitle()
    {
            return __('Informations');
    }

       
    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
}
?>