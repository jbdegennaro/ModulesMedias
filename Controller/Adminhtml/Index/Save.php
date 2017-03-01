<?php 
namespace Modules\Divabox\Controller\Adminhtml\Index;
use \Magento\Backend\App\Action;

/**
* 
*/
class Save extends Action
{
	
	public function execute()
	{
		$isPost = $this->getRequest()->getPost();

		if ($isPost) 
		{
			$model = $this->_objectManager->create('Modules\Divabox\Model\Medias');
			$id = $this->getRequest()->getParam('id');

			if ($id) 
			{
				$model->load($id);
			}

			$formData = $this->getRequest()->getParam('medias');
			$model->setData($formData);

			try
			{
				$model->save();

				$this->messageManager->addSuccess(__('media enregistré'));

				if ($this->getRequest()->getParam('back')) 
				{
					$this->_redirect('*/*/edit', ['id' => $model->getId(), '_current' => true]);
					return;
				}

				$this->_redirect('*/*/'); //Retour à la liste des medias
			}
			catch (\Execption $e)
			{
				$this->messageManager->addError($e->getMessage());
			}

			$this->_getSession()->setformData($formData);
			$this->_redirect('*/*/edit', ['id' => $id]);

		}
	}
}


?>