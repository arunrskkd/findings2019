<?php
namespace Acodez\Bannerslider\Block\Adminhtml;
class Slides extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_slides';/*block grid.php directory*/
        $this->_blockGroup = 'Acodez_Bannerslider';
        $this->_headerText = __('Slides');
        $this->_addButtonLabel = __('Add New Slide'); 
        parent::_construct();
		
    }
}
