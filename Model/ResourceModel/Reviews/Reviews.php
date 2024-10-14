<?php
namespace Macademy\Trainee\Model\ResourceModel\Reviews;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class Reviews extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('store_reviews', 'review_id');
    }
}
