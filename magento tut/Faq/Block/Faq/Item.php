<?php

namespace Acodez\Faq\Block\Faq;

use Magento\Framework\View\Element\Template;

class Item extends Template
{
    protected $jsonHelper;
    protected $categoryFactory;
    protected $faqFactory;
    protected $storeManager;
    protected $scopeConfig;

    public function __construct
    (
        Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \Acodez\Faq\Model\FaqCategoryFactory $categoryFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Acodez\Faq\Model\FaqFactory $faqFactory,
        array $data = []
    )
    {
        if($scopeConfig->getValue('faq/general/layout', \Magento\Store\Model\ScopeInterface::SCOPE_STORE) == \Acodez\Faq\Model\Source\Config\Layout::ONE_COLUMN){
            $this->setTemplate('Acodez_Faq::1column/faq.phtml');
        }
        else{
            $this->setTemplate("Acodez_Faq::faq.phtml");
        }
        $this->jsonHelper = $jsonHelper;
        $this->categoryFactory = $categoryFactory;
        $this->faqFactory = $faqFactory;
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getDataOneColumnJson()
    {
        $storeIds = [0];
        array_push($storeIds, $this->storeManager->getStore()->getStoreId());
        $data = [];
        $i = 0;
        $categories = $this->categoryFactory->create()
            ->getCollection()
            ->addFieldToFilter('status',1)
            ->addFieldToFilter('store_id',array('in'=>$storeIds))
            ->getBySortOrder();
        foreach($categories as $val){
            $data[$i] = $val->getData();
            $data[$i]['faq_items'] = $this->faqFactory->create()->getFaqByCategoryId($val->getCategoryId())
                ->getBySortOrder()->getData();
            $i++;
        }
        return $this->jsonHelper->jsonEncode($data);
    }

    public function isAjaxPageType()
    {
        $pageStyleConfig = $this->scopeConfig->getValue('faq/general/page_type', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if($pageStyleConfig == \Acodez\Faq\Model\Source\Config\PageType::AJAX){
            return true;
        }
        return false;
    }
}