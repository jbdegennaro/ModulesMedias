<?php 
namespace Modules\Divabox\Block;
use magento\framework\View\Element\Template;


class Main extends Template
{
	
	public function afficher()
	{
		$objectManager = \magento\framework\App\ObjectManager::getInstance();

		$collection = $objectManager
		->create('Modules\Divabox\Model\Resource\Medias\Collection');
		return $collection->load()->getData();
	}

	public function getSaveUrl()
	{
		return $this->getUrl('*/*/save');
	}
}

?>