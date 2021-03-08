<?php
namespace AHT\CRUD\Block;

use Magento\Framework\App\Filesystem\DirectoryList;
 
class Insert extends \Magento\Framework\View\Element\Template
{
	
    protected $_pageFactory;
    protected $_postFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AHT\CRUD\Model\PostFactory $postFactory
    ) {
        $this->_pageFactory  = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}