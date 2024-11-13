<?php

namespace Macademy\Trainee\Model\ResourceModel\ReviewsT;

use Macademy\Trainee\Model\ReviewsT;
use Macademy\Trainee\Model\ResourceModel\ReviewsT\ReviewsT as ReviewsTResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ReviewsT::class, ReviewsTResource::class);
    }
}
