<?php

/**
 * Grid Grid Collection.
 * @category    Webkul
 * @author      Webkul Software Private Limited
 */
namespace Macademy\Trainee\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Macademy\Trainee\Model\Grid', 'Macademy\Trainee\Model\ResourceModel\Grid');
    }
}
