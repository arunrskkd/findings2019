<?php
namespace Acodez\Bannerslider\Block\Adminhtml\Slides\Edit\Tab;
class Slides extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
     protected $_categories;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwyg,
        \Acodez\Bannerslider\Model\Bannerslider $bannerslider,
        array $data = array()
    ) {
        $this->_systemStore = $systemStore;
        $this->wysiwyg = $wysiwyg;
             $this->bannerslider = $bannerslider;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
		/* @var $model \Magento\Cms\Model\Page */
        $model = $this->_coreRegistry->registry('acodez_bannerslides');
		$isElementDisabled = false;
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('Slide Details')));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }

		$fieldset->addField(
            'name',
            'text',
            array(
                'name' => 'name',
                'label' => __('Title'),
                'title' => __('Title'),
                /*'required' => true,*/
            )
        );
        
        $fieldset->addField(
            'description',
            'editor',
            array(
                'name' => 'description',
                'label' => __('Description'),
                'title' => __('Description'),
                 'config'    => $this->wysiwyg->getConfig(),
                'wysiwyg'   => true
                /*'required' => true,*/
            )
        );
         
		// $fieldset->addField(
  //           'desktop_image',
  //           'image',
  //           array(
  //               'name' => 'desktop_image',
  //               'label' => __('Desktop Image'),
  //               'title' => __('Desktop Image'),
  //               'required' => true,
  //               'note' => 'Allow image type: jpg, jpeg, gif, png',
  //           )
  //       );

        $fieldset->addField( 
        'desktop_image', 
        'image',
        [ 
        'name' => 'desktop_image', 
        'label' => __('Desktop Image'), 
        'title' => __('Desktop Image'),             
        'note' => __('Size: 1600px x 730px, Allowed File Types : (JPG,JPEG,PNG), Max Size:2MB.'), 
        'required' => true, 
        'value' => $model->getDesktopImage()
        ] 
        )->setAfterElementHtml('
        <script>
            require([
                 "jquery",
            ], function($){
                $(document).ready(function () {
                    
                    if($("#page_desktop_image").attr("value")){
                        $("#page_desktop_image").removeClass("required-file");
                    }else{
                        $("#page_desktop_image").addClass("required-file");
                    }
                    $( "#page_desktop_image" ).attr( "accept", "image/x-png,image/gif,image/jpeg,image/jpg,image/png" );
                });
              });
       </script>
    ');

           $fieldset->addField( 
        'icon', 
        'image',
        [ 
        'name' => 'icon', 
        'label' => __('Icon'), 
        'title' => __('Icon'),             
        'note' => __(' Allowed File Types : (svg), Max Size:2MB.'), 
        
        'value' => $model->getIcon()
        ] 
        );
    //        ->setAfterElementHtml('
    //     <script>
    //         require([
    //              "jquery",
    //         ], function($){
    //             $(document).ready(function () {
    //                 if($("#page_icon").attr("value")){
    //                     $("#page_icon").removeClass("required-file");
    //                 }else{
    //                     $("#page_icon").addClass("required-file");
    //                 }
    //                 $( "#page_icon" ).attr( "accept", "image/x-png,image/gif,image/jpeg,image/jpg,image/png" );
    //             });
    //           });
    //    </script>
    // ');



          $fieldset->addField( 
        'mobile_image', 
        'image',
        [ 
        'name' => 'mobile_image', 
        'label' => __('Mobile Image'), 
        'title' => __('Mobile Image'),             
        'note' => __('Size: 1600px x 730px, Allowed File Types : (JPG,JPEG,PNG), Max Size:2MB.'), 
        'required' => true, 
        'value' => $model->getMobileImage()
        ] 
        )->setAfterElementHtml('
        <script>
            require([
                 "jquery",
            ], function($){
                $(document).ready(function () {
                    if($("#page_mobile_image").attr("value")){
                        $("#page_mobile_image").removeClass("required-file");
                    }else{
                        $("#page_mobile_image").addClass("required-file");
                    }
                    $( "#page_mobile_image" ).attr( "accept", "image/x-png,image/gif,image/jpeg,image/jpg,image/png" );
                });
              });
       </script>
    ');

        // $fieldset->addField(
        //     'mobile_image',
        //     'image',
        //     array(
        //         'name' => 'mobile_image',
        //         'label' => __('Mobile Image'),
        //         'title' => __('Mobile Image'),
        //         'required' => true,
        //         'note' => 'Allow image type: jpg, jpeg, gif, png',
        //     )
        // );
        $fieldset->addField(
            'slide_url',
            'text',
            array(
                'name' => 'slide_url',
                'label' => __('Slide Url'),
                'title' => __('Slide Url'),
                /*'required' => true,*/
            )
        );
        $fieldset->addField(
            'bg_color',
            'text',
            array(
                'name' => 'bg_color',
                'label' => __('Background Color'),
                'title' => __('Background Color'),
                /*'required' => true,*/
            )
        );
           $fieldset->addField( 
        'bg_image', 
        'image',
        [ 
        'name' => 'bg_image', 
        'label' => __('Background Image'), 
        'title' => __('Background Image'),             
        'note' => __(' Size: 1600px x 730px, Allowed File Types : (JPG,JPEG,PNG), Max Size:2MB.'), 
        
        'value' => $model->getBgImage()
        ] 
        );
        $fieldset->addField(
            'dark_mode',
            'select',
            array(
                'name' => 'dark_mode',
                'label' => __('Enable Dark Mode'),
                'title' => __('Enable Dark Mode'),
                'required' => true,
                 'options' => ['1' => __('Yes'), '0' => __('No')]
            )
        );
         $fieldset->addField(
            'status',
            'select',
            array(
                'name' => 'status',
                'label' => __('Enabled'),
                'title' => __('Enabled'),
                'required' => true,
                 'options' => ['1' => __('Yes'), '0' => __('No')]
            )
        );
	
         $allcategories=$this->getAllCategories();
         
        $dbCategories=$this->getAssignedcategories( $model );
         $fieldset->addField(
            'slider_category',
            'select',
            array(
                'name' => 'slider_category',
                'label' => __('Slider category'),
                'title' => __('Slider category'),
                'required' => true,
                 'options' => $allcategories
            )
        );
       
       
       
        // if (!$model->getId()) {
        //     $model->setData('status', $isElementDisabled ? '2' : '1');
        // }

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();   
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Slide Details');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Slide Details');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    private function getAllCategories()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $categories = $objectManager->create('Acodez\Bannerslider\Model\ResourceModel\Category\Collection')->load();

        $itemList = array();
        $itemList1;
       // $itemList ='';
        $count =1;
       
        foreach($categories as $_item)
        {
            
          
            //['1' => __('Yes'), '0' => __('No')]
           
                $itemList[$_item['id']] = $_item['bannerslides_category_name'];

           
            //  $count++;
           
        }

       
        return $itemList;
    }
     private function getAssignedcategories( $model )
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $selectedCategories = $objectManager->create('Acodez\Bannerslider\Model\ResourceModel\Bannerslider\Collection')->addFieldToFilter('id', array('eq' => $model->getId()))->load();

        $categories = array();
       
        foreach($selectedCategories as $_item)
        {
            $categories=$_item['slider_category'];
            $categories=explode(",",$categories);
            
           
        } 
         
        return $categories;
    }

    
}
