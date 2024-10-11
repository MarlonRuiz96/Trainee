<?php
namespace Macademy\Trainee\Api;

interface PrueRepositoryInterface
{
    /**
     * Obtener lista de registros
     *
     * @return \Macademy\Trainee\Api\Data\PruebaInterface[]
     */
    public function getList();
}
