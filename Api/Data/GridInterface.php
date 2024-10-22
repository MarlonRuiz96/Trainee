<?php
/**
 * Webkul_Grid Grid Interface.
 *
 * @category    Webkul
 *
 * @author      Webkul Software Private Limited
 */
namespace Macademy\Trainee\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'review_id';
    const CUSTOMER_NAME = 'customer_name';
    const CUSTOMER_EMAIL = 'customer_email';

    const RATING = 'rating';
    const REVIEW = 'review';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATE_AT = 'updated_at';


    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId);

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getCustomerName();

    /**
     * Set Title.
     */
    public function setCustomerName($customerName);

    /**
     * Get Content.
     *
     * @return varchar
     */
    public function getCustomerEmail();

    /**
     * Set Content.
     */
    public function setCostumerEmail($customerEmail);

    /**
     * Get Publish Date.
     *
     * @return varchar
     */
    public function getRating();

    /**
     * Set PublishDate.
     */
    public function setRating($rating);

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function GetReview();

    /**
     * Set StartingPrice.
     */
    public function setReview($review);

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateAt();

    /**
     * Set UpdateTime.
     */
    public function setUpdateAt($update_at);

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);
}
