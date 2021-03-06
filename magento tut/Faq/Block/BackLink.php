<?php

namespace Acodez\Faq\Block;

use Magento\Framework\View\Element\Template;

class BackLink extends \Magento\Framework\View\Element\Html\Link
{
    protected $scopeConfig;

    public function __construct
    (
        Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    )
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * Render block HTML.
     *
     * @return string
     */
    protected function _toHtml()
    {
        return '';
    }
}