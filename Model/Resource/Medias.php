<?php 
namespace Modules\Divabox\Model\Resource;
use magento\framework\Model\ResourceModel\Db\AbstractDb;

class Medias extends AbstractDb 
{	
	protected function _construct()
	{
		$this->_init('modules_media', 'id');
	}
}
?>