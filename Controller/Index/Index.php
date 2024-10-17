<?php
declare(strict_types=1);
namespace Macademy\Trainee\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\view\Result\PageFactory; //Para crear una pagina
use Magento\Framework\view\Result\Page;

class Index implements HttpGetActionInterface
{
    public function __construct(
        private PageFactory $pageFactory,
    ){}
    public function execute(): Page
    {
        return $this->pageFactory->create();
    }
}
