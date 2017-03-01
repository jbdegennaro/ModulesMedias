<?php 
namespace Modules\Divabox\Block\Adminhtml;

class Medias extends \Magento\Backend\Block\Widget\Grid\Container
{
	protected function _construct()
	{
		$this->_controller = 'adminhtml_medias';
		$this->_blockGroup = 'Modules_Divabox';
		$this->_headerText = __('Gestion des medias');
		$this->_addButtonLabel = __('Ajouter un media');
		parent::_construct();
	}
}
?>