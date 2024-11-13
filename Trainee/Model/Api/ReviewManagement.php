<?php

namespace Macademy\Trainee\Model\Api;

use Macademy\Trainee\Model\Calculation\ReviewFactory;
use Psr\Log\LoggerInterface;

class ReviewManagement
{
    /**
     * @var ReviewFactory
     */

    protected $reviewFactory;
    protected $logger;

    public function __construct(
        ReviewFactory $reviewFactory,
        LoggerInterface $logger

    ){
        $this->reviewFactory = $reviewFactory;
        $this->logger = $logger;
    }

    public function insertReview(array $data)
    {
        try {
            $review =$this->reviewFactory->create();
            $review->setData($data);
            $review->save();
            return ['status' => true, 'message' => 'Review inserted successfully.'];
        } catch (\Exception $e) {
            $this->logger->error('Error inserting data: ' . $e->getMessage());
            return ['status' => false, 'message' => $e->getMessage()];

        }
    }

    /**
     *
     * @inheritDoc
     */

    public function getReview()
    {
        try {
            $collection = $this->reviewFactory->create()->getCollection();
            $reviews = $collection->getData();
            return ['status' => true, 'data' => $reviews];
        } catch (\Exception $e) {
            $this->logger->error('Error retrieving data: ' . $e->getMessage());
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * @inheritDoc
     */
    public function getReviewById($reviewRateId)
    {
        try{
            $review = $this->reviewFactory->create()->load($reviewRateId);
            if (!$review->getId()) {
                return ['status' => false, 'message' => 'Review not found.'];
            }
            return ['status' => true, 'data' => $review->getData()];
        }catch (\Exception $e){
            $this->logger->error('Error retrieving data: ' . $e->getMessage());
        }
    }
    /**
     * @inheritDoc
     */
    public function deleteReview($reviewId)
    {
        try {
            $review = $this->reviewFactory->create()->load($reviewId);
            if (!$review->getId()) {
                return ['status' => false, 'message' => 'Review not found.'];

            }
            $review->delete();
            return ['status' => true, 'message' => 'Review deleted successfully.'];

        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function updateReview()
    {
        $edit = file_get_contents('php://input');
        $data = json_decode($edit, true);

        if (!isset($data['review_id'])) {
            return ['status' => false, 'message' => 'Review ID is required.'];
        }

        $reviewId = $data['review_id'];

        $review = $this->reviewFactory->create()->load($reviewId);
        if (!$review->getId()) {
            return ['status' => false, 'message' => 'Review not found.'];
        }

        try {
            // Remover 'review_id' del array de datos para evitar cambiar el ID
            unset($data['review_id']);

            // Actualizar los datos de la reseña
            $review->addData($data);
            $review->save();

            return ['status' => true, 'message' => 'Review updated successfully.'];
        } catch (\Exception $e) {
            $this->logger->error('Error updating data: ' . $e->getMessage());
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}
