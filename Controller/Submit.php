<?php
declare(strict_types=1);

namespace Macademy\Trainee\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Customer\Model\Session as CustomerSession;

class Submit implements HttpPostActionInterface
{
    private $redirectFactory;
    private $messageManager;
    private $customerSession;

    public function __construct(
        Context $context,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager,
        CustomerSession $customerSession
    ) {
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
        $this->customerSession = $customerSession;
    }

    public function execute()
    {
        $isLoggedIn = $this->customerSession->isLoggedIn();
        $name = $isLoggedIn ? $this->customerSession->getCustomer()->getName() : $this->getRequest()->getParam('name');
        $email = $isLoggedIn ? $this->customerSession->getCustomer()->getEmail() : $this->getRequest()->getParam('email');
        $rating = (int) $this->getRequest()->getParam('rating');
        $opinion = trim((string) $this->getRequest()->getParam('opinion'));

        // Validación de los datos
        if ($rating < 1 || $rating > 5) {
            $this->messageManager->addErrorMessage('Por favor, selecciona una calificación válida.');
        } elseif (empty($opinion) || (!$isLoggedIn && (empty($name) || empty($email)))) {
            $this->messageManager->addErrorMessage('Por favor, completa todos los campos requeridos.');
        } else {
            // Aquí guardarías la opinión en la base de datos o en otro almacenamiento.
            $this->messageManager->addSuccessMessage('¡Gracias por tu opinión!');
        }

        // Redirigir al usuario de vuelta a la página de opiniones
        $resultRedirect = $this->redirectFactory->create();
        $resultRedirect->setPath('reviews/index');
        return $resultRedirect;
    }
}
