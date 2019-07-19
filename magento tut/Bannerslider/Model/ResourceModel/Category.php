<?php
/**
 * Copyright © 2015 Acodez. All rights reserved.
 */
namespace Acodez\Bannerslider\Model\ResourceModel;

class Category extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

 public function __construct(
		
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
       
        parent::__construct($context);
    }

    public function _construct()
    {
        $this->_init('acodez_bannerslides_category', 'id');
    }


  
}
