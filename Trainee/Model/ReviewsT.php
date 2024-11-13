<?php

namespace Macademy\Trainee\Model;

use Magento\Framework\Model\AbstractModel;

class ReviewsT extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\ReviewsT\ReviewsT::class);
    }
}
