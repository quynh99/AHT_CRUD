<?php
namespace AHT\CRUD\Block;
class Edit extends \Magento\Framework\View\Element\Template
{
    protected $_pageFactory;
    protected $_postFactory;
    protected $_request;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AHT\CRUD\Model\PostFactory $postFactory,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        $this->_request = $request;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

    public function getId()
    {

        $urlId = $this->_request->getParam('id');
        return $urlId;
    }

    public function getPost($fieldName)
    {
        $post = $this->_postFactory->create()->load($this->getId());
        $name  = $post->getData($fieldName);
        return $name;
    }
}