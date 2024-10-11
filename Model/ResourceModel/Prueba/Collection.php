<?php
namespace Macademy\Trainee\Model\ResourceModel\Prueba;

use Macademy\Trainee\Model\Prueba as PruebaModel;
use Macademy\Trainee\Model\ResourceModel\Prueba\Prueba as PruebaResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(PruebaModel::class, PruebaResource::class);
    }
}
