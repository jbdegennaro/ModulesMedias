<?php 
namespace Modules\Divabox\Controller\Adminhtml\Index;

class Edit extends \Magento\Backend\App\Action
{
    protected $_coreRegistry = null;
    protected $resultPageFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context, 
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Magento\Framework\Registry $registry)
	{
		$this->resultPageFactory = $resultPageFactory;
		$this->_coreRegistry = $registry;
		parent::__construct($context);
	}	

	public function execute()
	{
		//récupéartion de l'id et du modèle 
		$id = $this->getRequest()->getParam('id');
		$model = $this->_objectManager->create('Modules\Divabox\Model\Medias');

		//vérfication si l'id existe dans la BDD
		if ($id)
		{
			$model->load($id);
			if (!$model->getId()) 
			{
				$this->messageManager->addError(__('no exist'));
				$resultRedirect = $this->resultRedirectFactory->create();
				return $resultRedirect->setPath('*/*/');
			}
		}//fin de la vérification de lid
	
		//récupérations des données
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data))
        {
            $model->setData($data);
        }

        // Sauvegarde du model pour l'utiliser dans les blocs par la suite
        $this->_coreRegistry->register('modules_divabox', $model);

        // Construction du formulaire
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Modules_Divabox::index')
            ->addBreadcrumb(__('Medias'), __('Medias'))
            ->addBreadcrumb(__('Gestion des medias'), __('Gestion des medias'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Modification de ') . $model->getName() : __('Nouveau media'));

        return $resultPage;
    }//fin de la fonction execute
}
?>