<?php 
namespace Modules\Divabox\Controller\Adminhtml\Index;
use \Magento\Backend\App\Action;

/**
* 
*/
class Delete extends Action
{
	
	public function execute()
	{
		$id = (int) $this->getRequest()->getParam('id');

		if ($id) 
		{
			$model = $this->_objectManager->create('Modules\Divabox\Model\Medias');
			$model->load($id);

			if (!$model->getId()) 
			{
				$this->messageManager->addError(__('Ce media n\'existe pas... '));
			}
			else
			{
				try
				{
                    $model->delete();
                    $this->messageManager->addSuccess(__('Media bien supprimé !'));
                    $this->_redirect('*/*/'); // Redirection vers la liste des Medias
                    return;
				}
				catch (\Exception $e)
				{
                    $this->messageManager->addError($e->getMessage());
                    $this->_redirect('*/*/edit', ['id' => $model->getId()]);	
				}//fin execption
			}//fin de la sous condition else
		}//fin de la condition
	}//fin de la function execute()
}//fin de la class Delete
?>