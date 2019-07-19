<?php
/**
 * Copyright © 2015 Acodez. All rights reserved.
 */
namespace Acodez\Bannerslider\Model\ResourceModel;

/**
 * Testimonials resource
 */
class Bannerslider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('acodez_bannerslides', 'id');
    }

  
}
