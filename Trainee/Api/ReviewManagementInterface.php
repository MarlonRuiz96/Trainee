<?php

namespace Macademy\Trainee\Api;


interface ReviewManagementInterface
{
    /**
     * Insertar datos en la tabla "Reviews"
     *
     * @param string[] $data
     * @return string
     */
    public function insertReview($data);

    /**
     * Get reviews
     *
     * @return array
     */
    public function getReview();

    /**
     * Obtener una reseña por ID
     *
     * @param int $reviewId
     * @return array
     */
    public function getReviewById($reviewId);

    /**
     * Borrar por ID
     * @param int $reviewId
     * @return bool
     */

    public function deleteReview($reviewId);

    /**
     * Actualizar una reseña existente
     *
     * @return array
     */
    public function updateReview();
}
