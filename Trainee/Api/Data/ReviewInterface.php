<?php
namespace Macademy\Trainee\Api\Data;

interface ReviewInterface
{
    const ENTITY_ID = 'review_id';
    const CUSTOMER_NAME = 'customer_name';
    const CUSTOMER_EMAIL = 'customer_email';

    const RATING = 'rating';
    const REVIEW = 'review';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATE_AT = 'updated_at';

    /**
     * Get review ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get customer name
     *
     * @return string
     */
    public function getCustomerName();

    /**
     * Get customer email
     *
     * @return string
     */
    public function getCustomerEmail();

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating();

    /**
     * Get review text
     *
     * @return string
     */
    public function getReview();

    /**
     * Set review ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Set customer name
     *
     * @param string $customerName
     * @return $this
     */
    public function setCustomerName($customerName);

    /**
     * Set customer email
     *
     * @param string $customerEmail
     * @return $this
     */
    public function setCustomerEmail($customerEmail);

    /**
     * Set rating
     *
     * @param int $rating
     * @return $this
     */
    public function setRating($rating);

    /**
     * Set review text
     *
     * @param string $review
     * @return $this
     */
    public function setReview($review);

    /**
     * Obtener la fecha de creación
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Establecer la fecha de creación
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Obtener la fecha de actualización
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Establecer la fecha de actualización
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

}
