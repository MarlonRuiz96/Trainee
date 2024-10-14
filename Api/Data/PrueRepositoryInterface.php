<?php
namespace Macademy\Trainee\Api\Data;

interface PrueRepositoryInterface
{
    /**
     * Obtener lista de registros
     *
     * @return \Macademy\Trainee\Api\Data\PruebaInterface[]
     */
    public function getList();
}
