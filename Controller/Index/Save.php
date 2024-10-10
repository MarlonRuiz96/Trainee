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
        $nombre = $this->request->getParam('nombre');
        if ($nombre) {
            try {
                $connection = $this->resource->getConnection();
                $tableName = $this->resource->getTableName('prueba');
                $connection->insert($tableName, ['nombre' => $nombre]);

                $this->messageManager->addSuccessMessage(__('Nombre guardado exitosamente.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Error al guardar el nombre.'));
            }
        } else {
            $this->messageManager->addErrorMessage(__('El campo nombre es requerido.'));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('reviews/index/index');
        return $resultRedirect;
    }
}
