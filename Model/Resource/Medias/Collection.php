<?php 
namespace Modules\Divabox\Model\Resource\Medias;
use magento\framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Modules\Divabox\Model\Medias', 'Modules\Divabox\Model\Resource\Medias');
	}
}

?>