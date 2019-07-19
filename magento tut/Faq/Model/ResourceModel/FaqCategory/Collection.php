<?php

namespace Acodez\Faq\Model\ResourceModel\FaqCategory;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Acodez\Faq\Model\FaqCategory', 'Acodez\Faq\Model\ResourceModel\FaqCategory');
    }

    public function getBySortOrder()
    {
        $this->getSelect()->reset('order');
        return $this->setOrder('sort_order', 'asc');
    }
}