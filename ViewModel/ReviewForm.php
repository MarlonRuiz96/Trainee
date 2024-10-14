<?php

declare(strict_types=1);

namespace Macademy\Trainee\ViewModel;

use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class ReviewForm implements ArgumentInterface
{
    /**
     * @var CustomerSession
     */

    private $customerSession;

    public function __construct(CustomerSession $customerSession)
    {
        $this->customerSession = $customerSession;
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
        if ($this->isLoggedIn()){
            $customer= $this->customerSession->getCustomer();
            return $customer->getFirstname(). ' ' . $customer->getLastname();
        }
        return null;
    }

    /**
     * Obtemer el correo del cliente
     *
     * @return string|null
     *
     */

    public function getCustomerEmail(): ?string
    {
        if ($this->isLoggedIn()) {
            $customer = $this->customerSession->getCustomer();
            return $customer->getEmail();
        }
        return null;
    }
}
