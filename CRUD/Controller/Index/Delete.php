<?php
namespace AHT\CRUD\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_postFactory;
    protected $resultRedirect;
    protected $_cache;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AHT\CRUD\Model\PostFactory $postFactory,
        \Magento\Framework\Controller\ResultFactory $result,
        \AHT\CRUD\Block\CacheFont $CacheFont
    ) {
        $this->_pageFactory   = $pageFactory;
        $this->_postFactory  = $postFactory;
        $this->resultRedirect = $result;
        $this->_cache         = $CacheFont;

        return parent::__construct($context);
    }

    public function execute()
    {

        $id     = $this->getRequest()->getParam('id');
        $delete = $this->_postFactory->create()->load($id);
        $delete->delete();

        $this->_cache->delete_Cache();

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('crud/index/index');
        return $resultRedirect;
    }
}