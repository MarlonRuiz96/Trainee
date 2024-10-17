<?php
namespace Macademy\Trainee\Model\ResourceModel\Reviews;

use Macademy\Trainee\Model\Reviews as  ReviewModel;
use Macademy\Trainee\Model\ResourceModel\Reviews\Reviews as ReviewsResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
    $this->_init(ReviewModel::class, ReviewsResource::class);
    }
}
