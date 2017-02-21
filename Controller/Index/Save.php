<?php 
namespace Modules\Divabox\Controller\Index;
//use magento\framework\App\Action\Action;

class Save extends \Magento\Framework\App\Action\Action
{
	public function execute()
	{
		// récupére les données du formulaire  
		$name = $this->getRequest()->getPost('name');
		$media = $this->getrequest()->getPost('media');

		// verifie si les formulaires sont remplis
		if (empty($name) || empty($media)) 
		{
			$this->messageManager->addError('tous les champs sont obligatoires');
			$this->_redirect('*/*/index');
		}
		else 
		{
			//sauvegarde des  données dans la table media
			$media = $this->_objectManager->create('Modules\Divabox\Model\Medias');
			$media->setName($name);
			$media->setMedia($media);
			$media->save();

			//message de validation & redirection
			$this->messageManager->addSuccess('Votre media est bien ajouté !');
			$this->_redirect('*/*/index');

		} //fin de la condition

	}//fin de la fonction

}//fin de la class
?>