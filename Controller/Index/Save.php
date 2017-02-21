<?php
namespace Modules\Divabox\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{

    public function execute()
	{

        // Récupération des données du formulaire

        $name = $this->getRequest()->getPost('name');
        $media = $this->getRequest()->getPost('media');

        if(empty($name) || empty($media)) // verifier si les champs sont remplis
		{
            $this->messageManager->addError('Tous les champs sont obligatoires !');
            $this->_redirect('*/*/index');
        }
		else
		{
        	// sauvegarde des données
            $medias = $this->_objectManager->create('Modules\Divabox\Model\Medias');
            $medias->setName($name);
            $medias->setMedia($media);
			$medias->save();

            // redirection sur l'index
            $this->messageManager->addSuccess('Media ajouté !');
            $this->_redirect('*/*/index');

        } //fin de la condition

    }// fin de la fonction

} // fin de la class
?>