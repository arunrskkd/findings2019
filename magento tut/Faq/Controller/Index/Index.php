<?php
namespace Acodez\Faq\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use \Magento\Framework\Exception\NotFoundException;

class Index extends Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;
    protected $scopeConfig;

    public function __construct
    (
        Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        PageFactory $resultPageFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function execute()
    {
        if(!$this->scopeConfig->getValue('faq/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE)){
            throw new NotFoundException(__('Parameter is incorrect.'));
        }
        $resultPage = $this->_resultPageFactory->create();

        $metaTitleConfig = $this->scopeConfig->getValue('faq/general/meta_title', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $metaKeywordsConfig = $this->scopeConfig->getValue('faq/general/meta_keywords', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $metaDescriptionConfig = $this->scopeConfig->getValue('faq/general/meta_description', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $pageTitle = $this->scopeConfig->getValue('faq/general/page_title', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        $layoutConfig = $this->scopeConfig->getValue('faq/general/layout', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if($layoutConfig == \Acodez\Faq\Model\Source\Config\Layout::ONE_COLUMN){
            $resultPage->addHandle('faq_1column_index');
        }
        else if($layoutConfig == \Acodez\Faq\Model\Source\Config\Layout::TWO_COLUMN_RIGHT){
            $resultPage->addHandle('faq_2right_index');
        }
        else if($layoutConfig == \Acodez\Faq\Model\Source\Config\Layout::TWO_COLUMN_LEFT){
            $resultPage->addHandle('faq_2left_index');
        }

        $resultPage->getConfig()->getTitle()->set($metaTitleConfig);
        $resultPage->getConfig()->setDescription($metaKeywordsConfig);
        $resultPage->getConfig()->setKeywords($metaDescriptionConfig);

        $pageMainTitle = $resultPage->getLayout()->getBlock('page.main.title');
        if ($pageMainTitle && $pageMainTitle instanceof \Magento\Theme\Block\Html\Title) {
            $pageMainTitle->setPageTitle($pageTitle);
        }

        return $resultPage;
    }
}