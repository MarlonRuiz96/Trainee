<?php
declare(strict_types=1);

namespace Macademy\Trainee\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\ResourceConnection;

class Save implements HttpPostActionInterface
{
    private $request;
    private $resultRedirectFactory;
    private $messageManager;
    private $resource;

    public function __construct(
        Context $context,
        RedirectFactory $resultRedirectFactory,
        RequestInterface $request,
        ManagerInterface $messageManager,
        ResourceConnection $resource
    ) {
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->request = $request;
        $this->messageManager = $messageManager;
        $this->resource = $resource;
    }

    public function execute(): ResultInterface
    {
        $nombre = $this->request->getParam('customer_name');
        $correo = $this->request->getParam('customer_email');
        $calificacion = $this->request->getParam('rating');
        $opinion = $this->request->getParam('review');

        if ($nombre && $correo && $calificacion && $opinion) {
            if ($calificacion < 1 || $calificacion > 5) {
                $this->messageManager->addErrorMessage(__('La calificación debe estar entre 1 y 5.'));
            } else {
                try {
                    $connection = $this->resource->getConnection();
                    $tableName = $this->resource->getTableName('store_reviews');
                    $connection->insert($tableName, [
                        'customer_name' => $nombre,
                        'customer_email' => $correo,
                        'rating' => $calificacion,
                        'review' => $opinion,
                        'status' => 'Pending'
                    ]);

                    $this->messageManager->addSuccessMessage(__('Opinión guardada exitosamente. Será revisada antes de publicarse.'));
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage(__('Error al guardar la opinión.'));
                }
            }
        } else {
            $this->messageManager->addErrorMessage(__('Todos los campos son requeridos.'));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('reviews/index/index');
        return $resultRedirect;
    }


}
