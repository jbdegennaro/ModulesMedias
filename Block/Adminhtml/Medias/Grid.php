<?php
namespace Modules\Divabox\Block\Adminhtml\Medias;
use \Magento\Backend\Block\Widget\Grid\Extended;
use \magento\backend\Block\Template\Context;
use \magento\backend\Helper\Data;
use \Modules\Divabox\Model\MediasFactory;
use \magento\Framework\Registry;

class Grid extends Extended
{
    protected $_mediasFactory; 
    protected $_coreRegistry;

    public function __construct(
            Context $context,
            Data $backendHelper,
            MediasFactory $mediasFactory, 
            Registry $coreRegistry,
            array $data = [] )

    {
        $this->_mediasFactory = $mediasFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $backendHelper, $data);
    }
    
    protected function _construct()
     {
        parent::_construct();
        $this->setId('mediaGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = $this->_mediasFactory->create()->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
     
    protected function _prepareColumns()
    {
        $this->addColumn(
                'id', [
                    'header' => __('ID'),
                    'type' => 'number',
                    'index' => 'id',
                    'header_css_class' => 'col-id',
                    'column_css_class' => 'col-id',
                    'width' => 10
                ]
            );
        
        $this->addColumn(
                'name', [
                    'header' => __('name'),
                    'index' => 'name',
                    'width' => 40
                ]
            );

        $this->addColumn(
                'media', [
                    'header' => __('media'),
                    'index' => 'media',
                    'width' => 40
                ]
            );

        // les export 
       //$this->addExportType('*/*/exportCsv', __('CSV'));
        //$this->addExportType('*/*/exportXml', __('XML'));
        //$this->addExportType('*/*/exportExcel', __('Excel')); 


       return parent::_prepareColumns();

    }
     
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('medias');
        $this->getMassactionBlock()->addItem(
                'delete', [
                    'label' => __('Supprimer'),
                    'url' => $this->getUrl('divabox/*/massDelete'),
                    'confirm' => __('Voulez vous vraiment supprimer ?'),
                ]
            );
            return $this;
    }

    public function getGridUrl()
    {
         return $this->getUrl('*/*/index', ['_current' => true]);
    }
  
    public function getRowUrl($row)
    {
            return $this->getUrl( '*/*/edit', ['id' => $row->getId()] );
    } 
}
?>