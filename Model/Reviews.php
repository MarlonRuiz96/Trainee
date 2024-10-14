<?php
namespace Macademy\Trainee\Model;

use Macademy\Trainee\Model\ResourceModel\Reviews\Reviews as ReviewResource;
use Magento\Framework\Model\AbstractModel;

class Reviews extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ReviewResource::class);
    }
}
