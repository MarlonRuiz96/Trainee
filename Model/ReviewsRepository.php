<?php
namespace Macademy\Trainee\Model;

use Macademy\Trainee\Api\Data\ReviewsInterface;
use Macademy\Trainee\Model\ResourceModel\Reviews\CollectionFactory;

class ReviewsRepository implements ReviewsInterface
{

    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
    ){
        $this->collectionFactory = $collectionFactory;
    }

    public function getReviews()
    {
        $collection = $this->collectionFactory->create();

        $items = [];
        foreach ($collection as $item) {
            $items[] = $item->getData();
        }

        return $items;
    }

}
