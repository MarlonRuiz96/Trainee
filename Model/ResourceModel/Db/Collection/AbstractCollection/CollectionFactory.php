<?php

namespace Macademy\Trainee\Model\ResourceModel\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class CollectionFactory
{
    public function create()
    {
        return new Collection();
    }
}
