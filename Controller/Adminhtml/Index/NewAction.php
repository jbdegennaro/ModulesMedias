<?php 
namespace Modules\Divabox\Controller\Adminhtml\Index;
use \Magento\Backend\App\Action;
use \Magento\Backend\App\Action\Context;
use \Magento\Backend\Model\View\Result\FowardFactory;
/**
* nom du fichier identique à la class
*/
class NewAction extends Action
{
	
	public function __construct(Context $context, FowardFactory $resultFowardFactory)
	{
		$this->resultFowardFactory = $resultFowardFactory;
		parent::__construct($context);
	}

	public function execute()
	{
		$resultFoward = $this->resultFowardFactory->create();
		return $resultFoward->forward('edit');
	}
}

?>