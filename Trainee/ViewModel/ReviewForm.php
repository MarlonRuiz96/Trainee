<?php

declare(strict_types=1);

namespace Macademy\Trainee\ViewModel;

use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Macademy\Trainee\Api\ReviewRepositoryInterface;

class ReviewForm implements ArgumentInterface
{
    /**
     * @var CustomerSession
     */
    private $customerSession;

    /**
     * @var ReviewRepositoryInterface
     */
    private $reviewRepository;

    public function __construct(
        CustomerSession $customerSession,
        ReviewRepositoryInterface $reviewRepository
    ) {
        $this->customerSession = $customerSession;
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * Verificar si el cliente esta logueado
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->customerSession->isLoggedIn();
    }

    /**
     * Obtener el nombre del cliente
     * @return string|null
     */
    public function getCustomerName(): ?string
    {
        if ($this->isLoggedIn()) {
            $customer = $this->customerSession->getCustomer();
            return $customer->getFirstname() . ' ' . $customer->getLastname();
        }
        return null;
    }

    /**
     * Obtener el correo del cliente
     * @return string|null
     */
    public function getCustomerEmail(): ?string
    {
        if ($this->isLoggedIn()) {
            $customer = $this->customerSession->getCustomer();
            return $customer->getEmail();
        }
        return null;
    }

    /**
     * Obtener las opiniones aprobadas
     * @return array
     */
    public function getApprovedReviews(): array
    {
        return $this->reviewRepository->getAll(); // Suponiendo que ya se filtran por 'Approved' en el repositorio.
    }


}
