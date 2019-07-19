<?php
 
namespace Acodez\Recipes\Block\Adminhtml\Recipes\Renderer;
 
use Magento\Framework\DataObject;
 
class RecipeImage extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{

    public function render(DataObject $row)
    {
        
        $catNames=array();
        $image= $row->getRecipeImage();
       
      
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface'); 
        $currentStore = $storeManager->getStore();
        $mediaUrl = $currentStore->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
       if($image){
          $imageUrl=$mediaUrl.$image;
       }else{
         $imageUrl= $this->getViewFileUrl('Acodez_Recipes::images/default_recipe.jpg');
       }
      
           
        $html='<img src="'.$imageUrl.'" width="50" height="50" />';
         
        return  $html;
    }
}