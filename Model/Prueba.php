<?php
namespace Macademy\Trainee\Model;

use Macademy\Trainee\Model\ResourceModel\Prueba\Prueba as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class Prueba extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
