<?php
namespace Macademy\Trainee\Api;

use Macademy\Trainee\Api\Data\ReviewInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ReviewRepositoryInterface
{
    /**
     * Get all reviews.
     *
     * @return \Macademy\Trainee\Api\Data\ReviewInterface[]
     */
    public function getAll();
}
