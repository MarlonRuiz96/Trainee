<?php

namespace Macademy\Trainee\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Macademy\Trainee\Model\ResourceModel\ReviewsT\CollectionFactory;

class MassDelete extends Action
{
    protected $collectionFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     */

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Execute the mass delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $ids = $this->getRequest()->getParam('selected'); // Obtener los IDs seleccionados

        if (!is_array($ids) || empty($ids)) {
            $this->messageManager->addErrorMessage(__('Please select items to delete.'));
        } else {
            try {
                // Crea la instancia de la colección usando la CollectionFactory
                $collection = $this->collectionFactory->create()
                    ->addFieldToFilter('review_id', ['in' => $ids]);

                $deletedCount = 0;

                foreach ($collection as $item) {
                    $item->delete(); // Elimina cada ítem de la colección
                    $deletedCount++;
                }

                $this->messageManager->addSuccessMessage(
                    __('A total of %1 record(s) have been deleted.', $deletedCount)
                );
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(
                    __('An error occurred while deleting items: %1', $e->getMessage())
                );
            }
        }

        // Redirige de vuelta al grid
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }

}
