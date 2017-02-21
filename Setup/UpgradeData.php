<?php 
namespace Modules\Divabox\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

/**
* 
*/
class UpgradeData implements UpgradeDataInterface
{
	
	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();

		if (version_compare($context->getVersion(), '1.0.1') < 0) {

			$tableName = $setup->getTable('modules_media'); // récupération de la table

			if (!$setup->getConnection()->isTableExists('modules_media')){
				//création de la table 
				$table = $setup->getConnection()
					->newTable($tableName)
					->addColumn(
							'id', Table::TYPE_INTEGER,null,[
								'indentity' => true, 'unsigned' => true,
								'nullable' => false, 'primary' => true, 'auto_increment' => true
							],'ID')

					->addColumn(
							'name', Table::TYPE_TEXT,255,['nullable' => false, 'default' => ''],'name')
					->addColumn(
							'media', Table::TYPE_TEXT,255,['nullable' => false, 'dafault'=> ''], 'media')

					->setComment('table test')
					->setOption('type', 'InnoDB')
					->setOption('charset', 'utf8');

				$setup->getConnection()->createTable($table);

				//Ajout de données dans la table
				$data = [
					['name' => 'image','media' => 'image1'],
				];

				foreach ($data as $item) {
					$setup->getConnection()->insert($tableName, $item);
				}
			}
		}	
		$setup->endSetup();
	}
}

?>