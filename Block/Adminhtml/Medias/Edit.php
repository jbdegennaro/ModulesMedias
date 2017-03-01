<?php 
namespace Modules\Divabox\Block\Adminhtml\Medias;

use Magento\Backend\Block\Widget\Context;
use magento\framework\Registry;


class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
	protected $_coreRegistry = null;

	public function __construct(Context $context, Registry $registry, array $data = [])
	{
		$this->_coreRegistry = $registry;
		parent::__construct($context, $data);
	}

	protected function _construct()
	{
		$this->_objectId = 'id';
		$this->_controller = 'adminhtml_medias';
		$this->_blockGroup = 'Modules_Divabox';

		parent::_construct();

		$this->buttonList->update('save', 'label', __('Sauvegarder'));
		$this->buttonList->add('saveandcontinue',
							[
								'label' => __('Sauvergarder & continuer'),
								'class' => 'save',
								'data_attribute' => [
												'mage-init' => [
												'button' => [
												'event' => 'saveAndContinueEdit',
												'target' => '#edit_form'	
												]
											]
										]
							],
							-100
							);
		$this->buttonList->update('delete', 'label', __('Supprimer'));

	}

	public function getHeaderText()
	{
		$registry = $this->_coreRegistry->registry('modules_divabox');

		if ($registry->getId()) {
			$name = $this->escapeHtml($registry->getName());
			return __("modification du media '%1'", $name);
		}
		else
		{
			return __('Ajout d\'un media');
		}
	}
}
?>