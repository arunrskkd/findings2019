<?php
 
namespace Acodez\Recipes\Block\Adminhtml\Recipes\Renderer;
 
use Magento\Framework\DataObject;
 
class RecipeCategoryName extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{

    public function render(DataObject $row)
    {
        
        $catNames=array();
        $mageCateId = $row->getRecipeCategories();
        $catIds= explode(",",$mageCateId );
        foreach($catIds as $catId){
             $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$storeCat = $objectManager->create('Acodez\Recipes\Model\ResourceModel\Recipecategory\Collection')->addFieldToFilter('id', array('eq' => $catId))->load();
             foreach ($storeCat as $catdata) {
               $catNameDetails=$catdata->getData();
               $catNames[]=$catNameDetails['recipe_category_name'];
                 # code...
             }
         }
         $catNameData=implode(",",$catNames);
        return $catNameData;
    }
}