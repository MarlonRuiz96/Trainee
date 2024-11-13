<?php

namespace Macademy\Trainee\Model;

use Magento\Framework\Model\AbstractModel;
use Macademy\Trainee\Api\Data\ReviewInterface;

class Grid extends AbstractModel implements ReviewInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'store_reviews';

    /**
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'store_reviews';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
            $this->_init(\Macademy\Trainee\Model\ResourceModel\ReviewsT\ReviewsT::class);
    }

    /**
     * Get EntityId.
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     *
     * @param int $entityId
     * @return $this
     */
    public function setId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get Title.
     *
     * @return string|null
     */
    public function getCustomerName()
    {
        return $this->getData(self::CUSTOMER_NAME);
    }

    /**
     * Set Title.
     *
     * @param string $customerName
     * @return $this
     */
    public function setCustomerName($customerName)
    {
        return $this->setData(self::CUSTOMER_NAME, $customerName);
    }

    /**
     * Get Content.
     *
     * @return string|null
     */
    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    /**
     * Set Content.
     *
     * @param string $customerEmail
     * @return $this
     */
    public function setCustomerEmail($customerEmail)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $customerEmail);
    }

    /**
     * Get PublishDate.
     *
     * @return string|null
     */
    public function getRating()
    {
        return $this->getData(self::RATING);
    }

    /**
     * Set PublishDate.
     *
     * @param int $rating
     * @return $this
     */
    public function setRating($rating)
    {
        return $this->setData(self::RATING, $rating);
    }

    /**
     * Get IsActive.
     *
     * @return string|null
     */
    public function getReview()
    {
        return $this->getData(self::REVIEW);
    }

    /**
     * Set IsActive.
     *
     * @param  string $review
     * @return $this
     */
    public function setReview($review)
    {
        return $this->setData(self::REVIEW, $review);
    }

    /**
     * Get UpdateTime.
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATE_AT);
    }

    /**
     * Set UpdateTime.
     *
     * @param string $update_at
     * @return $this
     */
    public function setUpdatedAt($update_at)
    {
        return $this->setData(self::UPDATE_AT, $update_at);
    }

    /**
     * Get CreatedAt.
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
