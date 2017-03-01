<?php
namespace Modules\Divabox\Block\Adminhtml\Medias\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('divabox_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Informations'));
    }

	protected function _beforeToHtml()
	{
		$this->addTab(
			'medias_info',
			[
				'label' => __('General'),
				'title' => __('General'),
				'content' => $this->getLayout()->createBlock(
						'Modules\Divabox\Block\Adminhtml\Medias\Edit\Tab\Info'
					)->toHtml(),
				'active' => true
			]
			);
		return parent::_beforeToHtml();
	}
} 
?>