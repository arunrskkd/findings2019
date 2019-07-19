<?php

namespace Acodez\Faq\Ui\DataProvider\Form;
use Acodez\Faq\Model\ResourceModel\FaqCategory\CollectionFactory;

class FaqCategoryProider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    protected $_request;
    protected $categoryCollectionFactory;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $categoryCollectionFactory,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $categoryCollectionFactory->create();
        $this->_request = $request;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $itemId = $this->_request->getParam('id');
        $this->collection = $this->categoryCollectionFactory->create();
        if (!empty($itemId)) {
            $items = $this->collection->getItems();
            foreach ($items as $item) {
                $this->loadedData[$item->getCategoryId()] = $item->getData();
            }

            $data = $this->dataPersistor->get('faq_category');
            if (!empty($data)) {
                $page = $this->collection->getNewEmptyItem();
                $page->setData($data);
                $this->loadedData[$page->getCategoryId()] = $page->getData();
                $this->dataPersistor->clear('faq_category');
            }
        }
        return $this->loadedData;
    }
}