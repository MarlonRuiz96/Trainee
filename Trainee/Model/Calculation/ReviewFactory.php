<?php

namespace Macademy\Trainee\Model\Calculation;

class ReviewFactory
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */

    protected $_objectManager;

    /**
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */

    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->_objectManager = $objectManager;
    }

    /**
     * Crear el nuevo modelo
     *
     * @param array $arguments
     * @return \Macademy\Trainee\Model\Calculation\ReviewRate
     */

    public function create(array $arguments=[])
    {
        return $this->_objectManager->create(\Macademy\Trainee\Model\Calculation\ReviewRate::class, $arguments);
    }
}
