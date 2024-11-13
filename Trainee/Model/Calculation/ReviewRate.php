<?php
namespace Macademy\Trainee\Model\Calculation;

use Macademy\Trainee\Api\Data\ReviewInterface;

class ReviewRate extends \Magento\Framework\Model\AbstractExtensibleModel implements ReviewInterface
{

    /**
     * Definir las constantes
     */

    public const REVIEW_ID = 'review_id';
    public const CUSTOMER_NAME = 'customer_name';
    public const CUSTOMER_EMAIL = 'customer_email';
    public const RATING = 'rating';
    public const REVIEW = 'review';
    public const STATUS = 'status';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    protected function _construct()
    {
        $this->_init(\Macademy\Trainee\Model\ResourceModel\ReviewsT\ReviewsT::class);
    }

    /**
     * @return ReviewRate
     * @throws \Magento\Framework\Exception\LocalizedException
     *
     */

    public function beforeSave()
    {
        /**
         * Aqui se agregan las validaciones
         */

        if(trim($this->getCustomerName())===''){
            throw new \Magento\Framework\Exception\LocalizedException(__('Customer name is required.'));
        }
    }

    /**
     * gets y sets
     */


    public function getCustomerName()
    {
      return $this->getData(self::CUSTOMER_NAME);
    }

    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    public function getRating()
    {
        return $this->getData(self::RATING);
    }

    public function getReview()
    {
        return $this->getData(self::REVIEW);
    }

    public function setCustomerName($name)
    {
        return $this->setData(self::CUSTOMER_NAME, $name);
    }

    public function setCustomerEmail($email)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $email);
    }

    public function setRating($rating)
    {
        return $this->setData(self::RATING, $rating);
    }

    public function setReview($review)
    {
        return $this->setData(self::REVIEW, $review);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($updatedAt)
    {

    }
}
