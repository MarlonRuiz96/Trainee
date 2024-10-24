<?php
namespace Macademy\Trainee\Api\Data;

interface ReviewInterface
{
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
     * @param string $name
     * @return $this
     */
    public function setCustomerName($name);

    /**
     * Set customer email
     *
     * @param string $email
     * @return $this
     */
    public function setCustomerEmail($email);

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
}
