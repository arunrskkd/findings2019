<?php
namespace Acodez\Bannerslider\Block\Adminhtml\Slides\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
		
        parent::_construct();
        $this->setId('acodez_slides_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Slides Information'));
    }
}