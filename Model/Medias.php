<?php
namespace Modules\divabox\Model;
use magento\framework\Model\AbstractModel;

class Medias extends AbstractModel
{
    protected function _construct()
	{
        $this->_init('Modules\Divabox\Model\Resource\Medias');
	}
}
?>