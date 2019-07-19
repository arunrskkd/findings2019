<?php

namespace Acodez\Faq\Model\ResourceModel;

class FaqCategory extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('acodez_faq_category', 'category_id');
    }
}