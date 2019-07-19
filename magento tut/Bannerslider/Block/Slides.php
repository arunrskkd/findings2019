<?php
namespace Acodez\Bannerslider\Block;
class Slides extends \Magento\Framework\View\Element\Template
{
	public $sliderfactory;
  public function __construct(
        \Magento\Catalog\Block\Product\Context $context, 
		\Acodez\Bannerslider\Model\ResourceModel\Bannerslider\Collection $collectionFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
      
       $this->_collectionFactory = $collectionFactory;   
       $this->scopeConfig = $scopeConfig;    
        parent::__construct($context, $data);
    }

   
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    public function getMediaUrl()
    {
        $_objectManager = \Magento\Framework\App\ObjectManager::getInstance(); //instance of\Magento\Framework\App\ObjectManager
		$storeManager = $_objectManager->get('Magento\Store\Model\StoreManagerInterface'); 
		$currentStore = $storeManager->getStore();
		$mediaUrl = $currentStore->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl ;
    }

    public function getBaseUrl()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
        $baseUrl= $storeManager->getStore()->getBaseUrl();
        return $baseUrl;
    }
	
	public function getSlides()
	{
		
		$collection =$this->_collectionFactory->addFieldToFilter('status', 1)->load();
        return $collection;
		
	}

    public function getCategorySlides($cid)
    {
        $collection =$this->_collectionFactory->addFieldToFilter('status', 1)->addFieldToFilter('slider_category',$cid)->load();
       
        return $collection;
        
    }

    public function isEnabled()
    {
        
        return $this->scopeConfig->getValue('acodez_bannerslider/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        
    }
    public function getCategoryHomeSlides($catId){
      $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $Collection = $objectManager->create('Acodez\Bannerslider\Model\ResourceModel\Bannerslider\Collection')->addFieldToFilter('status', 1)->addFieldToFilter('slider_category',$catId);
        $Collection->load();
        return $Collection;
    }
    
	
}