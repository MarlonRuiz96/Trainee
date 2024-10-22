<?php

namespace Macademy\Trainee\Ui\Component\Listing\DataProvider;

use Macademy\Trainee\Model\ResourceModel\Reviews\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;

class DataProvider extends AbstractDataProvider
{
    protected $loadedData;
    protected $searchCriteriaBuilder;
    protected $filterBuilder;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        $collection = $this->getCollection();

        // Verifica los datos originales en los logs
        error_log('Colección obtenida (raw): ' . print_r($collection->getData(), true));

        if (!$this->loadedData) {
            $this->loadedData = $collection->toArray();
        }

        // Verifica los datos convertidos a array
        error_log('Datos convertidos a array: ' . print_r($this->loadedData, true));

        return $this->loadedData;
    }

    /**
     * Aplicar filtros desde el grid.
     */
    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        $this->collection->addFieldToFilter($filter->getField(), $filter->getValue());
    }

    /**
     * Búsqueda personalizada con criterios.
     */
    public function addSearchCriteria(SearchCriteriaInterface $searchCriteria)
    {
        foreach ($searchCriteria->getFilterGroups() as $group) {
            foreach ($group->getFilters() as $filter) {
                $this->collection->addFieldToFilter($filter->getField(), $filter->getValue());
            }
        }
    }
}
