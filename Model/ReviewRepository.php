<?php
namespace Macademy\Trainee\Model;

use Macademy\Trainee\Api\ReviewRepositoryInterface;
use Macademy\Trainee\Api\Data\ReviewInterface;
use Magento\Framework\App\ResourceConnection;

class ReviewRepository implements ReviewRepositoryInterface
{
    private $resource;

    public function __construct(
        ResourceConnection $resource
    ) {
        $this->resource = $resource;
    }

    public function getAll()
    {
        $connection = $this->resource->getConnection();
        $tableName = $this->resource->getTableName('store_reviews');

        // Agregamos una cláusula WHERE para filtrar solo las opiniones aprobadas.
        $query = $connection->select()
            ->from($tableName)
            ->where('status = ?', 'Approved');

        $results = $connection->fetchAll($query);

        return $results;
    }

}
