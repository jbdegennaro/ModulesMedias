<?php
namespace Modules\Divabox\Controller\Adminhtml\Index;
use \Magento\Framework\View\Result\PageFactory;
use \Magento\Backend\App\Action\Context;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
   
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

     
    public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Modules_Divabox::index'); 
        $resultPage->addBreadcrumb(__('Gestion des medias'), __('Gestion des medias'));

        $resultPage->getConfig()->getTitle()->prepend(__('Gestion des medias'));

        return $resultPage;
        }
    }
?>