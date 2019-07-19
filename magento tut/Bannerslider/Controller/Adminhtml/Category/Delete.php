<?php
namespace Acodez\Bannerslider\Controller\Adminhtml\Category;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
		$id = $this->getRequest()->getParam('id');
		try {
				$banner = $this->_objectManager->get('Acodez\Bannerslider\Model\Category')->load($id);
				$banner->delete();
                $this->messageManager->addSuccess(
                    __(' Category Deleted successfully !')
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
	    $this->_redirect('*/*/');
    }
}
