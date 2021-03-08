<?php
namespace AHT\CRUD\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'aht_crud_post';

	protected $_cacheTag = 'aht_crud_post';

	protected $_eventPrefix = 'aht_crud_post';

	protected function _construct()
	{
		$this->_init('AHT\CRUD\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}