<?php
namespace Macademy\Trainee\Model;

use Macademy\Trainee\Api\PrueRepositoryInterface;
use Macademy\Trainee\Model\ResourceModel\Prueba\CollectionFactory;

class PrueRepository implements PrueRepositoryInterface
{
    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    public function getList()
    {
        $collection = $this->collectionFactory->create();

        $items = [];
        foreach ($collection as $item) {
            $items[] = $item->getData();
        }

        return $items;
    }
}
