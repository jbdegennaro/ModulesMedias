<?php
namespace Modules\Divabox\Controller\Adminhtml\Index;
use \Magento\Backend\App\Action;

class MassDelete extends Action
{

    public function execute()
    {
        $ids = $this->getRequest()->getParam('medias');

        foreach ($ids as $id)
        {

            try
            {
                    $model = $this->_objectManager->create('Modules\Divabox\Model\Medias');
                    $model->load($id)->delete();
            }
            catch (\Exception $e)
            {
                    $this->messageManager->addError($e->getMessage());
            }

        }

        if (count($ids))
        {
                $this->messageManager->addSuccess( __('%1 medias ont été supprimés !', count($ids)));
        }
            $this->_redirect('*/*/'); // redirige à la liste des medias
        }
    }
?>