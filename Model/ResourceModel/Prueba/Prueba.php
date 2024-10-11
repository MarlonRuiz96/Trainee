<?php
namespace Macademy\Trainee\Model\ResourceModel\Prueba;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Prueba extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('prueba', 'entity_id'); // Nombre de la tabla y la clave primaria
    }
}
