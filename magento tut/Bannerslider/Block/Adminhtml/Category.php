<?php
namespace Acodez\Bannerslider\Block\Adminhtml;
class Category extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
         $this->_controller = 'adminhtml_category';/*block grid.php directory*/
        $this->_blockGroup = 'Acodez_Bannerslider';
        $this->_headerText = __('Bannerslider');
        $this->_addButtonLabel = __('Add New Category'); 
        parent::_construct();
		
    }
}
