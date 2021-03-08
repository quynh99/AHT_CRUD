<?php
namespace AHT\CRUD\Controller\Index;
use Magento\Framework\App\Filesystem\DirectoryList;
 
class Save extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_postFactory;
     protected $_cacheTypeList;
     protected $_cacheFrontendPool;
     protected $_cache;

     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \AHT\CRUD\Model\PostFactory $postFactory,
          \AHT\CRUD\Block\CacheFont $CacheFont
     ) {
          $this->_pageFactory  = $pageFactory;
          $this->_postFactory = $postFactory;
          $this->_cache        = $CacheFont;
          return parent::__construct($context);
     }

     public function execute()
     {
          $post = $this->_postFactory->create();

          if (isset($_POST['btn_edit'])) {

               $id   = $this->getRequest()->getParam('id');
               $edit = $post->load($id);

               $edit->setName($_POST['name']);
               $edit->setContent($_POST['content']);
               $edit->save();
          } elseif (isset($_POST['btn_create'])) {

               $post->setName($_POST['name']);
               $post->setContent($_POST['content']);
               $post->save();
          }

          $this->_cache->delete_Cache();

          $resultRedirect = $this->resultRedirectFactory->create();
          $resultRedirect->setPath('crud/index/index');
          return $resultRedirect;
     }
}