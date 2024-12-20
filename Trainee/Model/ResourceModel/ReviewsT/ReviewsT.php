<?php
namespace Macademy\Trainee\Model\ResourceModel\ReviewsT;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class ReviewsT extends AbstractDb
{
    /**
     * @var string
     */
    protected $_idFieldName = 'review_id';
    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $_date;

    /**
     * Construct.
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\DateTime       $date
     * @param string|null                                       $resourcePrefix
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
                                                          $resourcePrefix = null
    )
    {
        parent::__construct($context, $resourcePrefix);
        $this->_date = $date;
    }

    /**
     * Initialize resource model.
     */


    protected function _construct()
    {
        $this->_init('store_reviews', 'review_id');
    }
}
