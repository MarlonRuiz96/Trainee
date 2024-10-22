<?php
namespace Vendor\Module\Model\ResourceModel\Review\Grid;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    protected function _construct()
    {
        $this->_init('Macademy\Trainee\Model\Review', 'Macademy\Trainee\Model\ResourceModel\Review');
    }
}
