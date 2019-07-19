<?php
namespace Acodez\Bannerslider\Controller\Adminhtml\Slides;
use Magento\Backend\App\Action;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
class Save extends \Magento\Backend\App\Action
{
    
 protected $_mediaDirectory;
protected $_fileUploaderFactory;
 
public function __construct(
    Action\Context $context,        
    \Magento\Framework\Filesystem $filesystem,
    \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
    \Magento\Backend\Helper\Js $jsHelper
) {
    $this->_mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
    $this->_fileUploaderFactory = $fileUploaderFactory;
     $this->_jsHelper = $jsHelper;
    parent::__construct($context);
}

    public function execute()
    {
        
        $data = $this->getRequest()->getParams();
          
        //   $categoryIds=$data['slider_category'];
        // if($data['slider_category']){

        //     $categories= implode(",",$data['slider_category']);
        //     $data['slider_category']=$categories;    
        // }   
         $base_media_path = 'bannerslider/images/';
        if (isset($_FILES['desktop_image']) && isset($_FILES['desktop_image']['name']) && strlen($_FILES['desktop_image']['name'])) {
        /*Image UploadStart */
        try{
                $desktopImage=$this->uploadFileAndGetName('desktop_image');
                if ($desktopImage['file']) {
                    $this->messageManager->addSuccess(__('Desktop Image has been successfully uploaded')); 
                }
                
                $data['desktop_image'] =$base_media_path.$desktopImage['file'];
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
            } else {
                if (isset($data['desktop_image']) && isset($data['desktop_image']['value'])) {
                    if (isset($data['desktop_image']['delete'])) {
                        $data['desktop_image'] = null;
                       // $data['desktop_image'] = true;
                    } elseif (isset($data['desktop_image']['value'])) {
                        $data['desktop_image'] = $data['desktop_image']['value'];
                      } else {
                    $data['desktop_image'] = null;
                    }
                }
            }
            if (isset($_FILES['mobile_image']) && isset($_FILES['mobile_image']['name']) && strlen($_FILES['mobile_image']['name'])) {
        /*Image UploadStart */
        try{
                $mobileImage=$this->uploadFileAndGetName('mobile_image');
                if ($mobileImage['file']) {
                    $this->messageManager->addSuccess(__('Mobile Image has been successfully uploaded')); 
                }
                
                $data['mobile_image'] =$base_media_path.$mobileImage['file'];
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
            } else {
                if (isset($data['mobile_image']) && isset($data['mobile_image']['value'])) {
                    if (isset($data['mobile_image']['delete'])) {
                        $data['mobile_image'] = null;
                       // $data['mobile_image'] = true;
                    } elseif (isset($data['mobile_image']['value'])) {
                        $data['mobile_image'] = $data['mobile_image']['value'];
                      } else {
                    $data['mobile_image'] = null;
                    }
                }
            }

              if (isset($_FILES['icon']) && isset($_FILES['icon']['name']) && strlen($_FILES['icon']['name'])) {
        /*Image UploadStart */
        try{
                $iconImage=$this->uploadFileAndGetName('icon');
                if ($iconImage['file']) {
                    $this->messageManager->addSuccess(__('Icon has been successfully uploaded')); 
                }
                
                $data['icon'] =$base_media_path.$iconImage['file'];
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
            } else {
                if (isset($data['icon']) && isset($data['icon']['value'])) {
                    if (isset($data['icon']['delete'])) {
                        $data['icon'] = null;
                       // $data['mobile_image'] = true;
                    } elseif (isset($data['icon']['value'])) {
                        $data['icon'] = $data['icon']['value'];
                      } else {
                    $data['icon'] = null;
                    }
                }
            }


  if (isset($_FILES['bg_image']) && isset($_FILES['bg_image']['name']) && strlen($_FILES['bg_image']['name'])) {
        /*Image UploadStart */
        try{
                $iconImage=$this->uploadFileAndGetName('bg_image');
                if ($iconImage['file']) {
                    $this->messageManager->addSuccess(__('Background Image has been successfully uploaded')); 
                }
                
                $data['bg_image'] =$base_media_path.$iconImage['file'];
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
            } else {
                if (isset($data['bg_image']) && isset($data['bg_image']['value'])) {
                    if (isset($data['bg_image']['delete'])) {
                        $data['bg_image'] = null;
                       // $data['mobile_image'] = true;
                    } elseif (isset($data['bg_image']['value'])) {
                        $data['bg_image'] = $data['bg_image']['value'];
                      } else {
                    $data['bg_image'] = null;
                    }
                }
            }

              /*Image UploadEnd */
             

        if ($data) {
            $model = $this->_objectManager->create('Acodez\Bannerslider\Model\Bannerslider');
        
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
            $model->setData($data);
         
            try {
                $model->save();
                 
                $this->messageManager->addSuccess(__('Slide  has been saved'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __($e->getMessage().'Something went wrong while saving the slides.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            return;
        }
        $this->_redirect('*/*/');
    }

    public function uploadFileAndGetName($filename){
         $target = $this->_mediaDirectory->getAbsolutePath('bannerslider/images/');        
        /** @var $uploader \Magento\MediaStorage\Model\File\Uploader */
        $uploader = $this->_fileUploaderFactory->create(['fileId' => $filename]);
        /** Allowed extension types */
        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png','svg']);
        /** rename file name if already exists */
        $uploader->setAllowRenameFiles(true);
        /** upload file in folder "mycustomfolder" */
        $result = $uploader->save($target);
        return $result;
    }

     
}
