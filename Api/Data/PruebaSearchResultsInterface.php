<?php
namespace Macademy\Trainee\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface PruebaSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get prueba list.
     *
     * @return \Macademy\Trainee\Api\Data\PruebaInterface[]
     */
    public function getItems();

    /**
     * Set prueba list.
     *
     * @param \Macademy\Trainee\Api\Data\PruebaInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
